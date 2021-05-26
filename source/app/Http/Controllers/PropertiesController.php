<?php

namespace App\Http\Controllers;

use App\Properties;
use App\Http\Requests\PropertyCreateRequest;
use App\Http\Requests\PropertyUpdateRequest;
use Illuminate\Http\Request;
use App\Audits;
use App\Types;
use App\Amenities;
use Flash;
use Session;
use Redirect;
use Auth;
use App\Http\Requests;

class PropertiesController extends Controller {

    /**
     * Validate session
     */
    public function __construct() {
        $this->middleware('admin');
        $this->middleware('role:13');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return view('admin.properties_list');
    }

    /**
     * Display list resources
     * @return type
     */
    public function lists() {
        $property = Properties::orderBy('created_at', 'desc')->get();
        $json = array();
        foreach ($property as $rs):
            
            $type=Types::find($rs->type_id);

            $json[] = array(
                'id' => $rs->id,
                "title_2" => $rs->title,
                "parse_text" => $this->parseText($rs->title),
                "title" => substr($rs->title, 0, 37) . '...',
                'type' => mb_substr($type->name, 0, 100) . '',
                "created_at" => date("m-d-Y H:i:s", strtotime($rs->created_at)),
            );
        endforeach;
        return response()->json($json);
    }

    /**
     * Display list photo page
     * @return type
     */
    public function lists_photo(Request $request) {
        $information = Properties::find($request['id']);
        $total = substr_count($information->image, ',');
        $json = array();
        if ($information->image != "") {
            for ($i = 1; $i <= substr_count($information->image, ','); $i++) {
                $imagen = explode(',', $information->image);
                $json[] = array('nombre' => $imagen[$i]);
            }
        }
        return response()->json($json);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
     
        $amenities = Amenities::where('status', '1')->orderBy('position', 'asc')->get();
        $types = Types::pluck('name','id');
        return view('admin.properties',compact('types'),['amenities'=>$amenities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyCreateRequest $request) {
        $propertys = Properties::orderBy('position', 'asc')->offset(0)->limit(100)->get();
        foreach ($propertys as $rs):
            $position = $rs->position + 1;
            $property = Properties::find($rs->id);
            $property->fill([
                'position' => $position,
            ]);
            $property->save();
        endforeach;

        $amenities = '';
        if (isset($request['amenities'])) {
            for ($i = 0; $i < count($request['amenities']); $i++) {
                $amenities .= ',' . $request['amenities'][$i];
            }
        }

        $property=Properties::create([
            'position' => '0',
            'title' => $request['title'],
            'title_en' => $request['title_en'],
            'price'=>$request['price'],
            'url' => $request['title'],
            'url_en' => $request['title_en'],
            'content' => $request['content'],
            'content_en' => $request['content_en'],
            'type_id' => $request['type'],
            'amenities'=>$amenities,
            'bedroom'=>$request['bedroom'],
            'bathroom'=>$request['bathroom'],
            'garage'=>$request['garage'],
            'kitchen'=>$request['kitchen'],
            'address'=>$request['address'],
            'google_maps'=>$request['google_maps'],
            'area'=>$request['area'],
            'image' => $request['image']
        ]);
        $this->audit('Registro de propiedad ID #' . $property->id);
        Session()->flash('notice', 'Registro Exitoso');
        return redirect::to('/properties');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $property = Properties::find($id);
        if (isset($property) == 0)
            return redirect::to('/blogs');
        $types = Types::pluck('name','id');
        $amenities = Amenities::where('status', '1')->orderBy('position', 'asc')->get();
        return view('admin.properties_edit',compact('types'),['property' => $property,'amenities'=>$amenities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyUpdateRequest $request, $id) {
        

        $amenities = '';
        if (isset($request['amenities'])) {
            for ($i = 0; $i < count($request['amenities']); $i++) {
                $amenities .= ',' . $request['amenities'][$i];
            }
        }


        $property = Properties::find($id);
        $property->fill([
            'title' => $request['title'],
            'title_en' => $request['title_en'],
            'price'=>$request['price'],
            'url' => $request['title'],
            'url_en' => $request['title_en'],
            'content' => $request['content'],
            'content_en' => $request['content_en'],
            'type_id' => $request['type'],
            'amenities'=>$amenities,
            'bedroom'=>$request['bedroom'],
            'bathroom'=>$request['bathroom'],
            'garage'=>$request['garage'],
            'kitchen'=>$request['kitchen'],
            'address'=>$request['address'],
            'google_maps'=>$request['google_maps'],
            'area'=>$request['area'],
            'image' => $request['image']
        ]);
        $property->save();
        $this->audit('Actualización propiedad ID #' . $id);
        Session()->flash('warning', 'Registro Actualizado');
        return Redirect::to('/properties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Properties::destroy($id);
        $this->audit('Eliminar propiedad ID #' . $id);
        return response()->json(["msg" => "borrado"]);
    }

    /**
     * Delete photo page
     * @param Request $request
     * @return type
     */
    public function delete_photo(Request $request) {
        $property = Properties::find($request['id']);
        $property->fill([
            'image' => $request['image'],
        ]);
        $property->save();
        $this->audit('Eliminar imagen de propiedad ID #' . $request['id']);
        return response()->json(["msg" => "borrado"]);
    }

    /**
     * Move items post
     * @param Request $request
     * @return boolean
     */
    public function move_post(Request $request) {
        try {
            foreach ($request['item'] as $key => $value) {
                $property = Properties::find($value);
                $property->fill([
                    'position' => $key
                ]);
                $property->save();
            }
            $this->audit('Ordenar informaciones');
            return response()->json(["msg" => "movido"]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Audit user
     * @return type
     */
    public function audit($activity) {
        Audits::create([
            'activity' => $activity,
            'ip' => $this->getIp(),
            'user_id' => Auth::guard('admin')->User()->id
        ]);
    }

    /**
     * Get Ip User
     * @return type
     */
    public function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * Parse text
     * @return type
     */
    public function parseText($value) {
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        $value = str_replace($find, $repl, $value);
        return $value;
    }

}

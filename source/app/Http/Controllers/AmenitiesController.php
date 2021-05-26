<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmenitiesRequest;
use App\Http\Controllers\Controller;
use App\Amenities;
use App\Audits;
use Flash;
use Session;
use Auth;
use Redirect;
use Illuminate\Http\Request;

class AmenitiesController extends Controller {

    /**
     * Validate session
     */
    public function __construct() {
        $this->middleware('admin');
        $this->middleware('role:14');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {
            return view('admin.amenities');
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display list resources
     * @return amenitie
     */
    public function lists() {
        try {
            $amenities = Amenities::where('status', '1')->orderBy('position', 'asc')->get();
            $json = array();
            foreach ($amenities as $rs):
                $json[] = array(
                    'id' => $rs->id,
                    "name" => $rs->name,
                    "name_en" => $rs->name_en,
                    "name_res" => substr($rs->name, 0, 40),
                    "created_at" => date("m-d-Y H:i:s", strtotime($rs->created_at)),
                );
            endforeach;
            return response()->json($json);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmenitiesRequest $request) {
        try {
            if ($request->ajax()) {
                $count_amenities = Amenities::where('name', $request['name'])->where('status', '1')->count();
                if ($count_amenities == 0) {
                    $amenities = Amenities::orderBy('position', 'asc')->offset(0)->limit(100)->get();
                    foreach ($amenities as $rs):
                        $position = $rs->position + 1;
                        $amenity = Amenities::find($rs->id);
                        $amenity->fill([
                            'position' => $position,
                        ]);
                        $amenity->save();
                    endforeach;
                    
                    $amenity=Amenities::create([
                        'position' => '0',
                        'name' => $request['name'],
                        'url' => $request['name'],
                        'name_en' => $request['name_en'],
                        'url_en' => $request['name_en'],
                        'status' => '1'
                    ]);

                    $this->audit('Registro de comodidades #' . $amenity->id);
                }
                return response()->json(["msg" => "created"]);
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
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
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            if ($request->ajax()) {
                $amenities = Amenities::find($id);
                $amenities->fill([
                    'name' => $request['name'],
                    'url' => $request['name'],
                    'name_en' => $request['name_en'],
                    'url_en' => $request['name_en']
                ]);
                $amenities->save();

                $this->audit('Actualización comodidades #' . $id);

                return response()->json(["msg" => "updated"]);
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $amenities = Amenities::find($id);
            $amenities->fill([
                'status' => '0'
            ]);
            $amenities->save();
            $this->audit('Eliminar comodidades ID #' . $id);
            return response()->json(["msg" => "updated"]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Move items Categoriess
     * @param Request $request
     * @return boolean
     */
    public function move_amenities(Request $request) {
        try {
            foreach ($request['item'] as $key => $value) {
                $amenities = Amenities::find($value);
                $amenities->fill([
                    'position' => $key
                ]);
                $amenities->save();
            }
            $this->audit('Ordenar comodidades');
            return response()->json(["msg" => "movido"]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Audit user
     * @return amenitie
     */
    public function audit($activity) {
        try {
            Audits::create([
                'activity' => $activity,
                'ip' => $this->getIp(),
                'user_id' => Auth::guard('admin')->User()->id
            ]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Get Ip User
     * @return amenitie
     */
    public function getIp() {
        try {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

}

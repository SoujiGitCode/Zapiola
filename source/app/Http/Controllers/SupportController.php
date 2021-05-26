<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comments;
use App\Audits;
use App\Mail\ZapiolaMail;
use Flash;
use Session;
use Mail;
use Auth;
use Redirect;
use App\Http\Requests;

class SupportController extends Controller {

    /**
     * Validate session
     */
    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {
            return view('admin.support');
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function sent() {
        try {
            return view('admin.support_sent');
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    public function listing($status) {
        $comment = Comments::where('status', $status)->orderby('created_at', 'desc')->get();
        $json = array();
        foreach ($comment as $rs) {
         
                $json[] = array(
                    'id' => $rs->id,
                    'name' => $rs->name,
                    'email' => $rs->email,
                    "message" => $rs->message,
                    "created_at" => date("m-d-Y H:i:s", strtotime($rs->created_at))
                );
            
        }
        return response()->json($json);
    }

//Listar Fotos de la pagina

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
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
        try {
            $buzon = Comments::find($id);
            if (isset($buzon) == 0)
                return redirect::to('/mailbox-received');


            return view('admin.buzon_edit', ['buzon' => $buzon]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {


        $buzon = Comments::find($id);
        $buzon->fill([
            'response' => $request['response'],
            'status' => '2',
        ]);
        $buzon->save();


        $content = $request['response'];

        $title = 'Soporte Zapiola';

        if ($request['email'] != "" && false !== filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {

            Mail::to($request['email'], $request['name'])->send(new ZapiolaMail('email_user', $title, $content));
        }

        $this->audit('Responder consulta ID #' . $id);

        Session()->flash('submit', 'Registro Exitoso');
        return redirect::to('/mailbox-received');
    }

    /**
     * Audit user
     * @return type
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
     * @return type
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Comments::destroy($id);
        return response()->json(["mensaje" => "borrado"]);
    }

    public function list_comment($post) {
        $comments = Comments::where('post', $post)->get();
        return response()->json($comments);
    }

}

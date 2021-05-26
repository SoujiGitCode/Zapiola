<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Audits;
use App\Visits;
use App\UsersPwa;
use DB;
use Auth;
use Redirect;
use PDF;
use Mail;
use Image;
use App\Http\Requests;
use App\Mail\BAMail;
use App\Http\Requests\AccountRequest;

class DashboardController extends Controller {

    /**
     * Validate session
     */
    public function __construct() {

        $this->middleware('admin');
    }

    /**
     * index
     * @return type
     */
    public function index() {

        try {



            $desktop = Visits::where('device', '1')->count();
            $mobiles = Visits::where('device', '2')->count();
            $tablets = Visits::where('device', '3')->count();



            $days = Visits::select('day', DB::raw('count(*) as total'))->where('month', date("m"))->where('year', date("Y"))->groupBy('day')->where('day', '!=', '')->orderby('day', 'asc')->get();

            $hours = Visits::select('visit_hour', DB::raw('count(*) as total'))->where('month', date("m"))->where('year', date("Y"))->groupBy('visit_hour')->orderby('visit_hour', 'asc')->get();


            $users = Visits::select('visit_date', 'month', DB::raw('count(*) as total'))
                    ->where('month', date("m"))
                    ->where('year', date("Y"))
                    ->groupBy('month', 'visit_date')
                    ->orderby('visit_date', 'asc')
                    ->get();


            $users_month = Visits::select('visit_date', DB::raw('count(*) as total'))
                    ->where('month', date("m"))
                    ->where('year', date("Y"))
                    ->groupBy('visit_date')
                    ->orderby('visit_date', 'asc')
                    ->get();



            return view('admin.index', ['desktop' => $desktop, 'mobiles' => $mobiles, 'tablets' => $tablets, 'hours' => $hours, 'users' => $users, 'days' => $days, 'users_month'=>$users_month]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    public function analytics_date($init, $end) {
        try {

            if (Auth::guard('admin')->User()->level != '1')
                return redirect::to('/dashboard');

            $init = explode('-', $init);
            $init = $init['2'] . '-' . $init['0'] . '-' . $init['1'];

            $end = explode('-', $end);
            $end = $end['2'] . '-' . $end['0'] . '-' . $end['1'];


            $desktop = Visits::where('device', '1')->whereBetween('visit_date', [date("Y-m-d", strtotime($init)), date("Y-m-d", strtotime($end))])->count();
            $mobiles = Visits::where('device', '2')->whereBetween('visit_date', [date("Y-m-d", strtotime($init)), date("Y-m-d", strtotime($end))])->count();
            $tablets = Visits::where('device', '3')->whereBetween('visit_date', [date("Y-m-d", strtotime($init)), date("Y-m-d", strtotime($end))])->count();






            $days = Visits::select('day', DB::raw('count(*) as total'))->whereBetween('visit_date', [date("Y-m-d", strtotime($init)), date("Y-m-d", strtotime($end))])->groupBy('day')->where('day', '!=', '')->orderby('day', 'asc')->get();

            $hours = Visits::select('visit_hour', DB::raw('count(*) as total'))->whereBetween('visit_date', [date("Y-m-d", strtotime($init)), date("Y-m-d", strtotime($end))])->groupBy('visit_hour')->orderby('visit_hour', 'asc')->get();



            return view('admin.metrics', ['desktop' => $desktop, 'mobiles' => $mobiles, 'tablets' => $tablets, 'hours' => $hours, 'users' => $users, 'init' => $init, 'end' => $end, 'days' => $days]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /* Acount data
     * @return boolean
     */

    public function account() {
        try {
            $user = User::find(Auth::guard('admin')->User()->id);
            return view('admin.account', ['user' => $user]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Update Account data
     * @param AccountRequest $request
     * @param type $id
     * @return boolean
     */
    public function update(AccountRequest $request, $id) {
        try {
            $user = User::find($id);
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = $request['password'];
            $user->save();
            $this->audit('Actualización de datos de la cuenta');
            Session()->flash('warning', 'Registro Actualizado');
            return Redirect::to('/my-account');
        } catch (Exception $ex) {
            return false;
        }
    }

    public function pages_listing() {
        try {
            $pages = Visits::select('page', DB::raw('count(*) as total'))
                            ->groupBy('page')->orderby('total', 'desc')->offset(0)->limit(9)->get();
            $json = array();
            foreach ($pages as $rs):
                $json[] = array(
                    'page' => $rs->page,
                    "views" => $rs->total
                );
            endforeach;
            return response()->json($json);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    public function pages_listing_date($init, $end) {
        try {
            $pages = Visits::select('page', DB::raw('count(*) as total'))
                            ->whereBetween('visit_date', [date("Y-m-d", strtotime($init)), date("Y-m-d", strtotime($end))])
                            ->groupBy('page')->orderby('total', 'desc')->offset(0)->limit(9)->get();
            $json = array();
            foreach ($pages as $rs):
                $json[] = array(
                    'page' => $rs->page,
                    "views" => $rs->total
                );
            endforeach;
            return response()->json($json);
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
     * Save avatar user
     * @param Request $request
     * @return type
     */
    public function avatar(Request $request) {
        try {

            $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
            $pic_name = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            $upload = $path . $pic_name;
            move_uploaded_file($temp, $upload);
            $name = explode('.', $pic_name);
            $name = strtolower($name[0]);
            $name = mb_strtolower($name, 'UTF-8');
            $name = str_replace('á', 'a', $name);
            $name = str_replace('é', 'e', $name);
            $name = str_replace('í', 'i', $name);
            $name = str_replace('ó', 'o', $name);
            $name = str_replace('ú;', 'u', $name);
            $name = str_replace('ñ', 'n', $name);
            $name = preg_replace('([^A-Za-z0-9])', '', $name);
            $name = str_replace('-', '_', $name);
            $name = str_replace(' ', '_', $name);

            $type = strtolower(strrchr($pic_name, "."));

            $name_new = $name . "_" . time();
            $pic_new = $name_new . $type;
            $upload_new = $path . $pic_new;
            rename($upload, $upload_new);

            $img = Image::make($path . $pic_new);
            $img->resize(300, 300)->save($path . $pic_new, 90);
            $img->resize(80, 80)->save($path . $name_new . '_thumb80' . $type, 90);
            $img->resize(58, 58)->save($path . $name_new . '_thumb58' . $type, 90);

            $user = User::find(Auth::guard('admin')->User()->id);
            $user->fill([
                'image' => $pic_new,
            ]);
            $user->save();

            return response()->json([
                        "mensaje" => "echo"
            ]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

}

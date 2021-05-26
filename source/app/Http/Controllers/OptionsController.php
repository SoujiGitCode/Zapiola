<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Audits;
use App\Settings;
use Redirect;
use Auth;
use DB;

class OptionsController extends Controller {

    /**
     * Validate Session
     */
    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Show options site
     * @return type
     */
    public function index() {
        try {
            return view('admin.options_site');
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Show options contact
     * @return type
     */
    public function contact() {
        try {
            return view('admin.option_contact');
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Show Seo
     * @return type
     */
    public function seo() {
        try {
            return view('admin.options_seo');
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Update options resource
     * @param Request $request
     */
    public function update(Request $request) {
        try {
            if ($request['type'] == 'image') {
                $this->audit('Actualización de la imagen principal del sitio');
                Settings::where('id', '1')->update([
                    'image' => $request['image']
                ]);
            }

            if ($request['type'] == 'image-1') {
                $this->audit('Actualización de la imagen de pie de página');
                Settings::where('id', '1')->update([
                    'image_1' => $request['image']
                ]);
            }
            if ($request['type'] == 'name') {
                $this->audit('Actualización de nombre del sitio');
                Settings::where('id', '1')->update([
                    'name' => $request['name'],
                    'name_en' => $request['name_en']
                ]);
            }
            if ($request['type'] == 'network') {
                $this->audit('Actualización de redes sociales');
                Settings::where('id', '1')->update([
                    'whatsapp' => $request['whatsapp'],
                    'facebook' => $request['facebook'],
                    'instagram' => $request['instagram']
                ]);
            }
            if ($request['type'] == 'contact') {
                $this->audit('Actualización de información de contacto');
                Settings::where('id', '1')->update([
                    'email' => $request['email'],
                    'phone'=>$request['phone'],
                    'address'=>$request['address'],
                    'shedule'=>$request['shedule'],
                    'shedule_en'=>$request['shedule_en']
                ]);
            }
            if ($request['type'] == 'seo') {
                $this->audit('Actualización de datos seo');
                Settings::where('id', '1')->update([
                    'description' => $request['description'],
                    'keywords' => $request['keywords'],
                    'description_en' => $request['description_en'],
                    'keywords_en' => $request['keywords_en'],
                ]);
            }
            return response()->json(["msg" => "echo"]);
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
    public function logo(Request $request) {
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
            Settings::where('id', '1')->update([
                'image' => $pic_new
            ]);
            return response()->json([
                        "mensaje" => "echo"
            ]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

}

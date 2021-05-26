<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comments;
use App\Properties;
use App\Visits;
use App\Types;
use Redirect;
use Mail;
use DB;
use App\Mail\ZapiolaMail;
use App\Http\Requests;

class FrontendController extends Controller {

    /**
     * Display index
     * @return type
     */
    public function index() {
        try {
            $url = explode("/", $_SERVER["REQUEST_URI"]);
            if (isset($url[1])) {
                if ($url[1] != 'en' || $url[1] == 'es') {
                    $lang = 'es';
                    $subtitle = " - Inicio";
                    $this->visits('Inicio');
                } else {
                    $lang = 'en';
                    $subtitle = "- Home";
                    $this->visits('Home');
                }
            } else {
                $lang = 'es';
                $subtitle = " - Inicio";
                $this->visits('Inicio');
            }
            $url_en = 'en';
            $url_es = 'es';
            $properties = Properties::orderBy('created_at', 'desc')->offset(0)->limit(6)->get();
            return view('frontend.home', ['subtitle' => $subtitle, 'properties' => $properties, 'lang' => $lang, 'url_en' => $url_en, 'url_es' => $url_es]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display sales
     * @return type
     */
    public function sales() {
        try {
            $url = explode("/", $_SERVER["REQUEST_URI"]);
            if ($url[1] != 'en' || $url[1] == 'es') {
                $lang = 'es';
                $subtitle = " - Venta";
                $this->visits('Venta');
            } else {
                $lang = 'en';
                $subtitle = "- Sale";
                $this->visits('Sale');
            }
            $url_en = 'en/sale';
            $url_es = 'venta';
            return view('frontend.sale', ['subtitle' => $subtitle, 'lang' => $lang, 'url_en' => $url_en, 'url_es' => $url_es]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display rental
     * @return type
     */
    public function rentals() {
        try {
            $url = explode("/", $_SERVER["REQUEST_URI"]);
            if ($url[1] != 'en' || $url[1] == 'es') {
                $lang = 'es';
                $subtitle = " - Alquiler";
                $this->visits('Alquiler');
            } else {
                $lang = 'en';
                $subtitle = "- Rental";
                $this->visits('Rental');
            }
            $url_en = 'en/rental';
            $url_es = 'alquiler';
            return view('frontend.rental', ['subtitle' => $subtitle, 'lang' => $lang, 'url_en' => $url_en, 'url_es' => $url_es]);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display search
     * @return type
     */
    public function search() {
        try {
            if (isset($_REQUEST['type']) && isset($_REQUEST['address'])) {
                $url = explode("/", $_SERVER["REQUEST_URI"]);
                if (isset($url[1])) {
                    if ($url[1] != 'en' || $url[1] == 'es') {
                        $lang = 'es';
                        $subtitle = " - Búsqueda";
                    } else {
                        $lang = 'en';
                        $subtitle = "- Search";
                    }
                } else {
                    $lang = 'es';
                    $subtitle = " - Búsqueda";
                }

                if ($lang == 'es') {
                    $type = Types::where('url', $_REQUEST['type'])->first();
                } else {
                    $type = Types::where('url_en', $_REQUEST['type'])->first();
                }
                if (isset($type) != 0) {

                    if ($lang == 'es') {
                        $this->visits('Búsqueda');
                    } else {
                        $this->visits('Search');
                    }

                    $url_en = 'en/search?type=' . $type->url_en . '&address=' . $_REQUEST['address'];
                    $url_es = 'es/busqueda?type=' . $type->url . '&address=' . $_REQUEST['address'];


                    $address = $_REQUEST['address'];
                    $address = str_replace('-', ' ', $address);
                    $address = ucwords($address);
                    return view('frontend.search', ['subtitle' => '- Busqueda', 'type' => $type, 'address' => $address, 'lang' => $lang, 'url_en' => $url_en, 'url_es' => $url_es]);
                } else {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display property_detail
     * @return type
     */
    public function property_detail() {
        try {

            $url = explode("/", $_SERVER["REQUEST_URI"]);
            if (isset($url[1])) {
                if ($url[1] != 'en' || $url[1] == 'es') {
                    $lang = 'es';
                } else {
                    $lang = 'en';
                }
            } else {
                $lang = 'es';
            }

            if ($lang == 'es') {

                $property = Properties::where('url', $url[2])->first();
            } else {

                $property = Properties::where('url_en', $url[2])->first();
            }


            if (isset($property) != 0) {

                if ($lang == 'es') {
                    $this->visits($property->title);

                    $title_ogg = $property->title;
                    $content = strip_tags($property->content, '');
                    $content_ogg = $content;
                    $url_ogg = url('/') . '/es/' . $property->url;
                } else {


                    $this->visits($property->title_en);

                    $title_ogg = $property->title_en;
                    $content = strip_tags($property->content_en, '');
                    $content_ogg = $content;
                    $url_ogg = url('/') . '/en/' . $property->url_en;
                }


                if ($property->image != "") {
                    $image = explode(",", $property->image);
                    $pic_name = $image[1];
                    $name = explode('.', $pic_name);
                    $ogg_img = $name[0] . '_290x290.' . $name[1];
                } else {
                    $ogg_img = '';
                }



                $properties = Properties::where('id', '!=', $property->id)->orderBy('created_at', 'desc')->offset(0)->limit(3)->get();


                $url_en = 'en/' . $property->url_en;
                $url_es = 'es/' . $property->url;



                return view('frontend.property_detail', ['property' => $property, 'subtitle' => '- Propiedad -' . $property->title, 'properties' => $properties, 'ogg_img' => $ogg_img, 'title_ogg' => $title_ogg, 'content_ogg' => $content_ogg, 'url_ogg' => $url_ogg, 'lang' => $lang,'url_en' => $url_en, 'url_es' => $url_es]);
            } else {
                return redirect('/');
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Get Type Device
     * @return string
     */
    public function getTypedevice() {
        try {
            $tablet_browser = 0;
            $mobile_browser = 0;
            $body_class = 'desktop';

            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                $tablet_browser++;
                $body_class = "tablet";
            }

            if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                $mobile_browser++;
                $body_class = "mobile";
            }

            if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
                $mobile_browser++;
                $body_class = "mobile";
            }

            $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
            $mobile_agents = array(
                'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
                'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
                'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
                'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
                'newt','noki','palm','pana','pant','phil','play','port','prox',
                'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
                'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
                'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
                'wapr','webc','winw','winw','xda ','xda-');

            if (in_array($mobile_ua,$mobile_agents)) {
                $mobile_browser++;
            }

            if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
                $mobile_browser++;
 
                $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
                if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                  $tablet_browser++;
              }
          }
          if ($tablet_browser > 0) {

             return 2;
         }
         else if ($mobile_browser > 0) {

             return 3;
         }
         else {

             return 1;
         } 

         return 1;
         
     } catch (Exception $ex) {
        return false;
    }
    return false;
}

    public function getDay($day) {
        try {
            if ($day == '0') {
                return 'Domingo';
            }
            if ($day == '1') {
                return 'Lunes';
            }
            if ($day == '2') {
                return 'Martes';
            }
            if ($day == '3') {
                return 'Miércoles';
            }
            if ($day == '4') {
                return 'Jueves';
            }
            if ($day == '5') {
                return 'Viernes';
            }
            if ($day == '6') {
                return 'Sábado';
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    public function getCodeLocation($ip) {
        try {
            $code = 'Buenos Aires F.D.';
            return $code;
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    public function getNameLocation($ip) {
        try {
            $name = 'Buenos Aires';
            return $name;
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    public function visits($page) {
        try {
            $visit = Visits::where('page', $page)->where('ip', $this->getIp())->where('visit_date', date("Y-m-d"))->get();
            if (count($visit) == 0) {
                Visits::create([
                    'page' => $page,
                    'ip' => $this->getIp(),
                    'device' => $this->getTypedevice(),
                    'visit_date' => date("Y-m-d"),
                    'year' => date("Y"),
                    'month' => date("m"),
                    'visit_hour' => date("H") . ':00:00',
                    'day' => date("w")
                ]);
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Store messages
     * @param Request $request
     * @return type
     */
    public function store_message(Request $request) {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);
            $isHuman = $this->validate_captcha_google($request['captcha']);
            if ($request['captcha'] == '' && env('ACTIVATE_CAPTCHA') == "1") {
                return response()->json(["response" => "no-catpcha"]);
            }
            if ($isHuman) {
                if ($request->ajax()) {
                    $name = $request['name'];
                    $email = $request['email'];
                    $message = $request['message'];
                    Comments::create([
                        'name' => $name,
                        'status'=>'1',
                        'email' => $email,
                        'message' => $message,
                    ]);
                    $content = 'Hola, Administrador Zapiola.<br/>
                <br/>
                Le informamos a través de este correo electrónico que tiene una nueva consulta por revisar. Los datos que hemos recibido son los siguientes:<br />
                <br />
                <strong>Nombre y Apellido:</strong>  ' . $name . '<br/>
                <strong>Correo electrónico:</strong>  ' . $email . '<br/>
                <strong>Mensaje:</strong>  ' . $message . '<br/>';
                    $title = "Nueva Consulta";
                    $site = DB::table('settings')->where('id', '1')->first();
                    Mail::to('alfredo@santabros.com.ar', $site->name)->send(new ZapiolaMail('email',$title, $content));
                    return response()->json(["msg" => "Contacto Enviado"]);
                }
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    public function validate_captcha_google($token) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => env('CAPTCHA_KEY_SECRET'), 'response' => $token)));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $arrResponse = json_decode($response, true);
            if ($arrResponse["success"] == '1' && $arrResponse["action"] == 'homepage' && $arrResponse["score"] >= 0.5) {
                return true;
            } else {
                return false;
            }
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

}

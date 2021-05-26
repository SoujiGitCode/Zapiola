<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Properties;
use App\Http\Requests;

class ApiPropertiesController extends Controller {



    /**
     * Show properties
     * @return type
     */
    public function lists($lang,$type,$area,$bedroom,$bathroom) {
        try {

            if ($area == '0') {
                $area = '';
            }

            if ($bedroom == '0') {
                $bedroom = '';
            }

            if ($bathroom == '0') {
                $bathroom = '';
            }

        
            $properties = Properties::
            where('type_id', $type)
            ->when(!empty($area), function ($query) use($area) {
                return $query->where('area', $area);
            })

            ->when(!empty($bedroom), function ($query) use($bedroom) {
                return $query->where('bedroom', $bedroom);
            })

            ->when(!empty($bathroom), function ($query) use($bathroom) {
                return $query->where('bathroom', $bathroom);
            })

            ->orderBy('created_at', 'desc')
            ->get();

            $json = array();
            foreach ($properties as $rs):

                if ($rs->image != "") {
                    $image = explode(",", $rs->image);
                    $image = $image[1];
                } else {
                    $image = "no-img.png";
                }

                $json[] = array(
                    'id' => $rs->id,
                    "title" =>($lang == 'es') ? $rs->title: $rs->title_en,
                    "url"=>($lang == 'es') ?  $rs->url: $rs->url_en,
                    "area"=>$rs->area,
                    "bedroom"=>$rs->bedroom,
                    "bathroom"=>$rs->bathroom,
                    "address"=>$rs->address,
                    "price"=>number_format($rs->price,0, ".", ","),
                    "price_1"=>(int) $rs->price,
                    "image"=>$image,
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
     * Show properties
     * @return type
     */
    public function lists_search($lang,$type,$search,$area,$bedroom,$bathroom) {
        try {

            if ($area == '0') {
                $area = '';
            }

            if ($bedroom == '0') {
                $bedroom = '';
            }

            if ($bathroom == '0') {
                $bathroom = '';
            }

            $search=$search;


       



        
            $properties = Properties::
            where('type_id', $type)
                        ->where('address', 'like', '%' . $search . '%')
            ->when(!empty($area), function ($query) use($area) {
                return $query->where('area', $area);
            })

            ->when(!empty($bedroom), function ($query) use($bedroom) {
                return $query->where('bedroom', $bedroom);
            })

            ->when(!empty($bathroom), function ($query) use($bathroom) {
                return $query->where('bathroom', $bathroom);
            })

            ->orderBy('created_at', 'desc')
            ->get();

            $json = array();
            foreach ($properties as $rs):

                if ($rs->image != "") {
                    $image = explode(",", $rs->image);
                    $image = $image[1];
                } else {
                    $image = "no-img.png";
                }

                $json[] = array(
                    'id' => $rs->id,
                    "title" =>($lang == 'es') ? $rs->title: $rs->title_en,
                    "url"=>($lang == 'es') ?  $rs->url: $rs->url_en,
                    "area"=>$rs->area,
                    "bedroom"=>$rs->bedroom,
                    "bathroom"=>$rs->bathroom,
                    "address"=>$rs->address,
                    "price"=>number_format($rs->price,0, ".", ","),
                    "price_1"=>(int) $rs->price,
                    "image"=>$image,
                    "created_at" => date("m-d-Y H:i:s", strtotime($rs->created_at)),
                );
            endforeach;

                 return response()->json($json);


        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

}

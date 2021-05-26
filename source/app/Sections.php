<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model {
    /**
     * Name of the table
     * @var type 
     */
    protected $table = 'sections';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','subtitle','content','title_en','subtitle_en','content_en','image','status','position','button_name','button_url','button_name_en','button_url_en','status_content'];
    /**
     * Set title attribute
     * @param type $value
     */
    public function setTitleAttribute($value) {


        $value=trim($value);
        //Asignamos Valor al atributo  Title
        $this->attributes['title'] = $value;
    }

    /**
     * Set title attribute
     * @param type $value
     */
    public function setTitleEnAttribute($value) {


   
        $value=trim($value);
        //Asignamos Valor al atributo  Title
        $this->attributes['title_en'] = $value;
    }
    

    /**
     * Set button_name attribute
     * @param type $value
     */
    public function setNameBotonEnAttribute($value) {

        $value=strip_tags($value);
        $value=preg_replace('/[^a-zA-Z0-9á-źÁ-Ź[?¿¡!.,\s]/s', '', $value);
        $value=trim($value);
        //Asignamos Valor al atributo  Title
        $this->attributes['button_name_en'] = $value;
    }


    

}


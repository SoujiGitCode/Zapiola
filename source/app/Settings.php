<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {
    /**
     * Name of the table
     * @var type 
     */
    protected $table = 'settings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','name_en','email','image','address','phone','shedule','shedule_en','facebook','whatsapp','instagram','api_key','list_mailchimp','image_1','description','description_en','keywords','keywords_en'];

}

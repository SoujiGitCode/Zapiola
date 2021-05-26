<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model

{
   /**
     * Name of the table
     * @var type 
     */
	protected $table = 'comments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable =['message','name','email','response','status'];

	

}


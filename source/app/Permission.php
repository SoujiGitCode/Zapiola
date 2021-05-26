<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    
    /**
     * Name of the table
     * @var type 
     */
    protected $table = 'permissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rol_id', 'module', 'submodule', 'type', 'status'];

}

<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
       'move-types',
       'move-amenities',
       'move-widget',
       'upload-image',
       'upload-thumb',
       'move-properties',
       'move-menu',
       'update_logo',
       'avatar',
       'store_message',
    ];
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use API;
use Session;
class AccessRightHelper extends ServiceProvider
{
    static function menu() {
        $userame = Session::get('user');
         $service = API::exec(array(
            'request' => 'GET',
            'method' => "tm_menu"
        ));
        
       return $service->data;
    }

    static function granted() {
        $current = str_replace(url('/') . '/', '', url()->current());

    }

}

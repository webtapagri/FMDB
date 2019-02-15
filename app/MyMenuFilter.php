<?php

namespace App;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Session;

class MyMenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        /* $granted = $this->menuByRole();
        $menu = [];    
        if(in_array($item['text'], $granted)) {
            return $item;   
        } */

        return $item;
    }

    public function menuByRole() {
        return array('Home', 'Material', 'Material Request', 'Edit Material Request');
    }
}

<?php

namespace App;

use Nette,
    Nette\Object;

class Routes extends Object implements IRoutes
{
    /**
     * @return array
     */
    public function getRoutes()
    {
        return [
//            'admin' => 'Admin:default',
//            'admin/prihlasit' => 'AdminUser:login',
//            'admin/odhlasit' => 'AdminUser:logout',
//            'admin/vytvorit-ucet' => 'AdminUser:register',

            'eshop' => 'Eshop:default',
            'eshop/<categoryUrl>' => 'Eshop:category',

            '<presenter>/<action>[/<id>]' => 'Homepage:default'
        ];
    }
}
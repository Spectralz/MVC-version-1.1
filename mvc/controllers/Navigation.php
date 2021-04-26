<?php


namespace controllers;


use classes\Role;

class Navigation
{
    public function __construct(){

    }

    public static function navBar()
    {
        $list = require_once ('configs/navRouting.php');
        $result = [];
        if(Role::getRole()){
            foreach ($list as $key => $value){
                if($value['access'][Role::getRole()-1] == 7){
                    $result[$key] = $value['name']['ru'];
                }
            }
        return $result;
    }
}}
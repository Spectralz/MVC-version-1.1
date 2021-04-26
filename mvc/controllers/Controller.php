<?php

namespace controllers;


class Controller
{
    private $data = [];

    public function __construct()
    {
    }

    public function data($variable, $value){
        $this->data[$variable] = $value;
    }

    public function display($title){
        $path = __DIR__.'/../views/'.$title.'.php';
        if(file_exists($path)){
            \extract($this->data);
            require_once ($path);
        }
    }

    public function model($title){
        $path = __DIR__.'/../models/'.$title.'.php';
        if(file_exists($path)){
            \extract($this->data);
            require_once ($path);
        }
    }

}
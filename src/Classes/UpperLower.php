<?php


namespace App\Classes;


use App\Controller\transform;

class UpperLower implements transform
{

    public function transform(string $string): string
    {
        return preg_replace_callback('/\w.?/', function ($m) { return ucfirst($m[0]); }, $string);
    }

}
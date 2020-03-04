<?php


namespace App\Services;


use App\Controller\transform;

class SpaceToDashes implements transform
{
    public function transform(string $string): string
    {
        return str_replace(' ', '-', strtolower($string));
    }
}
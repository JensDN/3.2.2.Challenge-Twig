<?php


namespace App\Services;


interface transform
{
    /**
     * @param string $string
     * @return string
     */
    public function transform (string $string):string;
}
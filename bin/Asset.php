<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 2/19/2019
 * Time: 2:47 PM
 */
namespace Core\bin;

class Asset
{
    public static function attach(string $asset) {
        $path = dirname(__DIR__)."/public/assets/";
        return $path.$asset;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 2/19/2019
 * Time: 2:47 PM
 */
namespace JobPosts\bin;

class Asset
{
    public static function attach(string $asset) {
        return "../public/assets/".$asset;
    }

}
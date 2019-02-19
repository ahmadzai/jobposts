<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 2/19/2019
 * Time: 1:27 PM
 */

namespace Core\bin;


class Controller
{
    protected function render(string $view="template", array $data = []) {

        $path = dirname(__DIR__) . '/src/template/';

        extract($data);
        require $path.$view.".php";

    }

}
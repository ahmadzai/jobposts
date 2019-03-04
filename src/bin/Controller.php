<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 2/19/2019
 * Time: 1:27 PM
 */

namespace JobPosts\bin;


use Symfony\Component\HttpFoundation\Response;

class Controller
{
    protected function render(string $view, array $data = []) {

        $path = dirname(__DIR__) . '/../src/template/';

        // make single variable out of array keys
        extract($data);
        ob_start();
        require $path.$view.".php";
        $content = ob_get_clean();
        return new Response($content);
        //require $path."template.php";
    }

}
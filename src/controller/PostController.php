<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 2/19/2019
 * Time: 12:09 PM
 */

namespace JobPosts\Controller;


use Core\bin\Asset;
use Core\bin\Controller;

class PostController extends Controller
{
    public function index() {
        $this->render("template", [
            'name'=>'Wazir',
            'file'=>Asset::attach("main.css")
        ]);
    }

}
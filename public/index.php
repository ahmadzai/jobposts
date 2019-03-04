<?php
/**
 * Created by PhpStorm.
 * User: Wazir
 * Date: 2/19/2019
 * Time: 12:05 PM
 */
require_once "../core/boot.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// controller that will be called
use JobPosts\Controller\PostController;

$request = Request::createFromGlobals();
$uri = $request->getPathInfo();

if ($uri == '/') {
    $response = (new PostController())->index();
} elseif ($uri == '/confirm' && $request->query->has('id')) {
    $response = (new PostController())->confirmJobPost($request->query->get('id'));
} elseif($uri == '/action' && $request->query->has('type')) {
    $response = (new PostController())->actionCompleted($request->query->get('type'));
} elseif($uri == '/test') {
    $response = (new PostController())->testEmail();
}
//elseif ($uri == '/confirm' && $request->query->has('id')) {
//    $response = show_action($request->query->get('id'));
//}
else {
    $html = '<html><body><h1>Page Not Found</h1></body></html>';
    $response = new Response($html, 404);
}

// echo the headers and send the response
$response->send();

//$post = new \JobPosts\Controller\PostController();
//$post->index();

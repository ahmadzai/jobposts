<?php
/**
 * Created by PhpStorm.
 * User: Wazir
 * Date: 2/19/2019
 * Time: 12:05 PM
 */
declare(strict_types=1);

require_once dirname(__DIR__).'/vendor/autoload.php';

$post = new \JobPosts\Controller\PostController();
$post->index();
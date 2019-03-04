<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 2/25/2019
 * Time: 8:04 PM
 */

require_once "core/boot.php";
// in real world the exception should be caught
$entityManager = \JobPosts\bin\Database::getEntityManager();
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);

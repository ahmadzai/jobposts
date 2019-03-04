<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 2/26/2019
 * Time: 5:15 PM
 */

namespace JobPosts\bin;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Database
{

    /**
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    public static function getEntityManager() {
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(
            $paths = [ dirname(__DIR__)."/model" ],
            $isDevMode,
            null,
            null,
            false
        );

        // normally this should be saved in secured settings file
        $conn = [
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'dbname' => 'job_ads'
        ];

        return EntityManager::create($conn, $config);
    }

}
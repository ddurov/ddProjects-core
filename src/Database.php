<?php

namespace Core;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\ORMSetup;

class Database
{
    /**
     * @param string $dbName
     * @param string $dbUser
     * @param string $dbPassword
     * @param string $dbServer
     * @param int $dbPort
     * @param string $attributeMetadataFolder
     * @param string $dbDriver
     * @return EntityManager
     * @throws Exception|MissingMappingDriverImplementation
     */
    public function create(
        string $dbName,
        string $dbUser,
        string $dbPassword,
        string $dbServer,
        int $dbPort,
        string $attributeMetadataFolder,
        string $dbDriver = "mysqli"
    ): EntityManager {
        return new EntityManager(
            DriverManager::getConnection([
                'dbname' => $dbName,
                'user' => $dbUser,
                'password' => $dbPassword,
                'host' => $dbServer,
                'port' => $dbPort,
                'driver' => $dbDriver,
            ]),
            ORMSetup::createAttributeMetadataConfiguration([$attributeMetadataFolder])
        );
    }
}
<?php

// Retenir son utilisation  => Database::getPDO()
// Design Pattern : Singleton
/**
 * Classe qui va nous permettre de nous connecter à notre base de données = oshop
 */
namespace Mini\Core;

use PDO;

class Database
{
    /** @var PDO */
    private $dbh;
    private static $_instance;
    private function __construct()
    {
       
        $configData = parse_ini_file(__DIR__ . '/../config.ini');

        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'ecran
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    public static function getPDO()
    {
     
        if (empty(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance->dbh;
    }
}
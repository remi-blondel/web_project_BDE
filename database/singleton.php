<?php

final class singleton
{
    /**
    *@var PDO $PDOInstance Instance de PDO
    */
    private static $PDOInstance = null;
    /**
    *@var string $dsn DSN pour la connexion
    */
    private static $dsn = null;
    /**
    *@var string $username Nom d'utilisateur pour la connexion
    */
    private static $username = null;

    /**
    *@var string $password Mot de passe pour la connexion
    */
    private static $password = null;
    /**
    *@var string $options Options du pilote
    */
    private static $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    /**
    * Constructeur privé
    */
    private function __construct()
    {

    }

    /**
    C'est ici que l'instance sera créée au premier appel.
    Les appels suivant nous utiliserons l'instance existante.
    @throws Exception si la connexion n'est pas configurée
    *
    @return PDO Instance unique de connexion
    */
    public static function getInstance()
    {
        if(self::$PDOInstance === null)
        {
            try
            {
                self::$PDOInstance = new PDO(self::$dsn, self::$username, self::$password, self::$options);
            }
            catch (\PDOException $e)
            {
                die('Erreur lors de l\'instanciation de la connection à la base de données : '.$e->getMessage());
            }
        }
        return self::$PDOInstance;
    }
    /**
    * Configuration de la connexion à la base.
    *
    * @param string $dsn DSN pour la connexion
    * @param string $username Nom d'utilisateur pour la connexion
    * @param string $password Mot de passe pour la connexion
    * @param array $options Options du pilote
    *
    * @return void
    */
    public static function setConfig($dsn, $username, $password, array
    $options = array())
    {
        self::$dsn = $dsn;
        self::$username = $username;
        self::$password = $password;
        self::$options = $options;
    }
    /**
    * Pour vérifier que la configuration de la connexion est faite.
    *
    * @return bool
    */
    private static function configDone()
    {
        return isset(self::$PDOInstance);
    }
}
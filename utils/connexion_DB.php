<?php

/**
 *  Class MyPDO
 *  
 *  Encapsuler la connexion à la base de données MySQL
 *  
 *  @see https://phpdelusions.net/pdo/pdo_wrapper
 */
class MyPDO
{
    /**
     * Connexion unique PDO
     *
     * @var PDO
     */
    public $pdo;

    /**
     * Chargement de connexion PDO
     * 
     * @param file Fichier .ini spécifique au database
     */
    public function __construct($file = 'my_setting.ini')
    {
        // parser le fichier en un tableau SI parse return false alors lancer une exception
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');
        // spécification de la source de la base de données
        $dns = $settings['database']['driver'] .
            ':host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];
        $default_options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            // Connexion à MySQL
            $this->pdo = new PDO($dns, $settings['database']['username'], $settings['database']['password'], $default_options);
        } catch (\PDOException $e) {
            //Gestion des erreurs de connexion
            echo "Erreur === > ";
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    /**
     * Execute une requête préparée SQL
     *  
     *  @param string $sql votre requête sql exemple : SELECT * FROM table
     *  @param array|null $args Arguments optionnels : Liage de paramètres avec l'instruction SQL
     */
    public function run($sql, $args = null)
    {
        // S'il n y a pas de paramètres alors on execute la requête 
        if (!$args) {
            // La méthode query exécute la requête sans paramètres
            return $this->pdo->query($sql);
        }
        // Preparation de la requête SQL 
        $stmt = $this->pdo->prepare($sql);
        // Execution de la requête et Liage aux paramètres 
        $stmt->execute($args);

        return $stmt;
    }
}

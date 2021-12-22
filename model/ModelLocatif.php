<?php

require_once "./utils/connexion_DB.php";


class ModelLocatif
{

    private MyPDO $model;
    // Identifiant UNIQUE DB
    private $id;

    // Nom client-entreprise
    private $nom;

    // Numero sirén 
    private $siren;

    private $codeClient;

    // Getters

    public function getId(): int
    {
        return $this->id;
    }
    public function getNom(): string
    {
        return  $this->nom;
    }
    public function getSiren(): int
    {
        return $this->siren;
    }
    public function getCodeClient(): int
    {
        return $this->codeClient;
    }

    // Setters 

    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }
    public function setSiren(int $siren)
    {
        $this->siren = $siren;
    }
    public function setCodeClient(int $codeClient)
    {
        $this->codeClient = $codeClient;
    }
    /**
     * Construit un objet de type MyPDO
     */
    public function __construct()
    {
        // Instantiation du connection
        $this->conn = new MyPDO();
    }

    // --------- Methode du CRUD



    /**
     * Lister les projets
     * 
     * 
     *
     * Composante R du SCRUD
     * 
     * @return array|object return obj PDOStatement->fetchAll Si il n'y a pas de projet return array vide
     */
    public function list()
    {
        // Préparation de la valeur de retour
        $result = [];

        $sql = "SELECT cdCli FROM entreprise_cliente";

        // Execution de la requête
        $result = $this->conn->run($sql);

        if ($result->rowCount() > 0) {
            // retourner une seule colonne 
            return $result->fetchAll(PDO::FETCH_COLUMN);
        }
        return $result;
    }
}

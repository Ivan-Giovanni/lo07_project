<!-- ----- debut ModelResidence -->

<?php
require_once 'Model.php';

class ModelResidence
{
    private $id, $label, $ville, $prix, $personne_id;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $ville = NULL, $prix = NULL, $personne_id = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->ville = $ville;
            $this->prix = $prix;
            $this->personne_id = $personne_id;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed|null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed|null $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed|null
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed|null $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed|null
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed|null $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed|null
     */
    public function getPersonneId()
    {
        return $this->personne_id;
    }

    /**
     * @param mixed|null $personne_id
     */
    public function setPersonneId($personne_id)
    {
        $this->personne_id = $personne_id;
    }


    public static function getAllResidencePersonne()
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT personne.nom, personne.prenom, residence.label, residence.ville, residence.prix FROM residence, personne WHERE personne.id = residence.personne_id AND personne.statut = 1;";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // les residences d'un client
    public static function getAllMyresidence($personne_id)
    {
        try {
            $database = Model::getInstance();
            $query = "select label, ville, prix from residence where personne_id = :personne_id;";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $personne_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getPatrimoine()
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT categorie, label, valeur, @capital := @capital + valeur AS capital FROM ( SELECT 'compte' AS categorie, label, montant AS valeur FROM compte WHERE personne_id = :personne_id UNION ALL SELECT 'residence' AS categorie, label, prix AS valeur FROM residence WHERE personne_id = :personne_id ORDER BY valeur ) AS union_table JOIN (SELECT @capital := 0) AS init;";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $_SESSION['user_info']['id']
            ]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getNetWorth()
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT p.id, p.nom, p.prenom, COALESCE(c.total_comptes, 0) AS total_comptes, COALESCE(r.total_residences, 0) AS total_residences, COALESCE(c.total_comptes, 0) + COALESCE(r.total_residences, 0) AS patrimoine_total FROM personne p LEFT JOIN ( SELECT personne_id, SUM(montant) AS total_comptes FROM compte GROUP BY personne_id ) c ON p.id = c.personne_id LEFT JOIN ( SELECT personne_id, SUM(prix) AS total_residences FROM residence GROUP BY personne_id ) r ON p.id = r.personne_id WHERE p.id != 0 ORDER BY p.id;";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    //obtenir l'id du propriétaire
    public static function IdProprietaire($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select personne_id from residence where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id

            ]);
            $results = $statement->fetch();

            $results = $results['0'];


            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //obtenir le prix de la résidence
    public static function residencePrix($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select prix from residence where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id

            ]);


            $results = $statement->fetch();
            $results = $results['prix'];

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function changePersonneResidence($id, $personne_id)
    {

        try {
            $database = Model::getInstance();
            $query = "UPDATE `residence` SET `personne_id`= :personne_id WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'personne_id' => $personne_id

            ]);
            $results = 1;
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }

    }

    // residences proposées pour l'achat
    public static function getResidence($personne_id) {

        try {
            $database = Model::getInstance();
            $query = "select id, label, ville, prix, personne_id from residence where personne_id != :personne_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $personne_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}

?>
<!-- ----- fin ModelResidence -->
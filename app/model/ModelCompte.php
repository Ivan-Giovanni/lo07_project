<!-- ----- debut ModelCompte -->

<?php
require_once 'Model.php';

class ModelCompte
{
    private $id, $label, $montant, $banque_id, $personne_id;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->montant = $montant;
            $this->banque_id = $banque_id;
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
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed|null $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed|null
     */
    public function getBanqueId()
    {
        return $this->banque_id;
    }

    /**
     * @param mixed|null $banque_id
     */
    public function setBanqueId($banque_id)
    {
        $this->banque_id = $banque_id;
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



    public static function getAllCompte($banque_id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from compte where banque_id = :banque_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'banque_id' => $banque_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllComptePersonnePays()
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT personne.nom, personne.prenom, banque.label, banque.pays, compte.label, compte.montant FROM personne, banque, compte WHERE personne.id = compte.personne_id AND banque.id = compte.banque_id AND personne.statut = 1;";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
<!-- ----- fin ModelCompte -->
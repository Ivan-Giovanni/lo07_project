<!-- ----- debut ModelResidence -->

<?php
require_once 'Model.php';

class ModelResidence
{
    private $id, $label, $ville, $prix, $personne_id;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $ville = NULL, $prix = NULL,  $personne_id = NULL)
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

}
?>
<!-- ----- fin ModelResidence -->
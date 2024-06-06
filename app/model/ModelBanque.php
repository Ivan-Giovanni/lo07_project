<!-- ----- debut ModelBanque -->

<?php
require_once 'Model.php';

class ModelBanque
{
    private $id, $label, $pays;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $pays = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->pays = $pays;
        }
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setLabel($label)
    {
        $this->label = $label;
    }

    function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getLabel(){
        return $this->label;
    }

    /**
     * @return mixed|null
     */
    public function getPays()
    {
        return $this->pays;
    }

    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from banque";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($label, $pays)
    {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from banque";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into banque value (:id, :label, :pays)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'pays' => $pays
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getBanqueId($label) {
        try {
            $database = Model::getInstance();
            $query = "select id from banque where label = :label";
            $statement = $database->prepare($query);
            $statement->execute([
                    'label' => $label
            ]);
            $results = $statement->fetchColumn();

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}

?>
<!-- ----- fin ModelBanque -->
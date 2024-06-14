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

    // Cette fonction retourne les comptes d'une personne  (pour le moment c'est beatrice)
    public static function getAllMyCompte($personne_id) {
        try {
            $database = Model::getInstance();
            $query = "select compte.label as label_compte, compte.montant, banque.label as label_banque, banque.pays from compte,banque where personne_id = :personne_id and banque_id = banque.id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id'=>$personne_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //ajout d'un nouveau  compte
    public static function insert($label, $montant, $banque_id, $personne_id) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from compte";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            //personne_id
            //ici beatrice
            // ajout d'un nouveau tuple;
            $query = "insert into compte values (:id, :label, :montant, :banque_id, :personne_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'montant' => $montant,
                'banque_id' => $banque_id,
                'personne_id' => $personne_id
            ]);

            $query = "select label from banque where id = $banque_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetch();
            $results = $results['0'];

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //  Transfert d'un compte vers un autre

    public static function count($personne_id) {
        try {
            $database = Model::getInstance();
            $query = "select count(id) from compte where personne_id = :personne_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $personne_id
            ]);
            $results = $statement->fetch();
            $results = $results['0'];
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // fonction pour avoir labels de compte
    public static function getMylabel($personne_id) {
        try {
            $database = Model::getInstance();
            $query = "select id, label from compte where personne_id = :personne_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $personne_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");

            return $results ;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }

    }

    public static function transfer($debit_id, $credit_id, $montant) {
        // id des comptes ; affichage des comptes du client
        try {
            if ($debit_id == $credit_id) {
                return -1;
            }else{

                $database = Model::getInstance();
                $query = "UPDATE `compte` SET `montant`= montant - :montant  WHERE id = :debit_id";
                $statement = $database->prepare($query);
                $statement->execute([
                    'debit_id' => $debit_id,
                    'montant' => $montant
                ]);

                $query = "UPDATE `compte` SET `montant`= montant  + :montant  WHERE id = :credit_id";
                $statement = $database->prepare($query);
                $statement->execute([
                    'credit_id' => $credit_id,
                    'montant' => $montant
                ]);

                return 1  ;

            }
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllComptePersonne($personne_id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from compte where personne_id = :personne_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $personne_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    public static function transferer($emetteur_id, $receveur_id, $montant)
    {
        try {
            $database = Model::getInstance();
            $query = "UPDATE compte SET montant = CASE WHEN id = :emetteur_id THEN montant - :montant WHEN id = :receveur_id THEN montant + :montant END WHERE id IN (:receveur_id, :emetteur_id);";
            $statement = $database->prepare($query);
            $statement->execute([
                'emetteur_id' => $emetteur_id,
                'receveur_id' => $receveur_id,
                'montant' => $montant
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
<!-- ----- fin ModelCompte -->
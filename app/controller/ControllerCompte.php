
<!-- ----- debut ControllerCompte -->
<?php
require_once '../model/ModelCompte.php';

class ControllerCompte {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerVin : caveAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des comptes
    public static function compteReadAll() {
        $results = ModelCompte::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewAll.php';
        if (DEBUG)
            echo ("ControllerCompte : compteReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function compteReadId($args) {
        $results = ModelCompte::getAllId();

        $target = $args['target'];

        if (DEBUG) {
            echo ("ControlleurVin:compteReadId : target = $target</br>");
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewId.php';
        require ($vue);
    }

    // Affiche un compte particulier (id)
    public static function compteReadOne() {
        $compte_id = $_GET['id'];
        $results = ModelCompte::getOne($compte_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewAll.php';
        require ($vue);
    }

    // Affiche le formulaire de creation d'un compte
    public static function compteCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau compte.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function compteCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelCompte::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewInserted.php';
        require ($vue);
    }

    // Fonction supp ?

    // --- Liste des comptes
    public static function prodReadAllRegion() {
        $results = ModelCompte::getAllRegion();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewAllProdRegion.php';
        if (DEBUG)
            echo ("ControllerCompte : prodReadAllRegion : vue = $vue");
        require ($vue);
    }

    public static function prodReadAllRegionProd() {
        $results = ModelCompte::getAllRegionProd();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewAllProdRegionProd.php';
        if (DEBUG)
            echo ("ControllerCompte : prodReadAllRegionProd : vue = $vue");
        require ($vue);
    }

    public static function compteDelete() {
        $compte_id = $_GET['id'];
        $results = ModelCompte::delete($compte_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewDelete.php';
        if (DEBUG)
            echo ("ControllerCompte : compteReadAll : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerCompte -->

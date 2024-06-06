
<!-- ----- debut ControllerBanque -->
<?php
require_once '../model/ModelBanque.php';

class ControllerBanque {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerBanque : caveAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des banques
    public static function banqueReadAll() {
        $results = ModelBanque::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewAll.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche le formulaire de creation d'un banque
    public static function banqueCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInsert.php';
        require ($vue);
    }
    public static function banqueCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelBanque::insert(
            htmlspecialchars($_GET['label']),
            htmlspecialchars($_GET['pays'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInserted.php';
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerBanque -->
<?php

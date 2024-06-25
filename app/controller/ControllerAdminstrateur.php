
<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerAdministrateur {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewPatrimoineAccueil.php';
        if (DEBUG)
            echo ("ControllerVin : caveAccueil : vue = $vue");
        require ($vue);
    }

    public static function adminReadAll()
    {
        $results = ModelPersonne::getAllAdmin();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAll.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : administrateurReadAll : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerAdministrateur -->

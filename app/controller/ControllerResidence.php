<!-- ----- debut ControllerResidence -->
<?php
require_once '../model/ModelResidence.php';

class ControllerResidence
{
    // --- page d'acceuil
    public static function caveAccueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo("ControllerVin : caveAccueil : vue = $vue");
        require($vue);
    }

    public static function residenceReadAll()
    {
        $results = ModelResidence::getAllResidencePersonne();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAll.php';
        if (DEBUG)
            echo("ControllerCompte : compteReadAll : vue = $vue");
        require($vue);
    }

    public static function patrimoineReadAll()
    {
        $results = ModelResidence::getPatrimoine();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewPatrimoine.php';
        if (DEBUG)
            echo("ControllerResidence : residenceReadAll : vue = $vue");
        require($vue);
    }

    // résidences du client connecté
    public static function residenceReadMyresidence()
    {
        $client_id = $_SESSION['user_info']['id'];
        $results = ModelResidence::getAllMyresidence($client_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAllMy.php';
        if (DEBUG)
            echo("ControllerResidence : residenceReadMyresidence : vue = $vue");
        require($vue);

    }

    public static function patrimoineForbes()
    {
        $results = ModelResidence::getNetWorth();

        include 'config.php';
        $vue = $root . '/app/view/residence/viewNetWorth.php';
            echo("ControllerResidence : residenceReadMyresidence : vue = $vue");
        require($vue);
    }

}

?>
<!-- ----- fin ControllerResidence -->

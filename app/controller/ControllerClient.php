
<!-- ----- debut ControllerClient -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerClient {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerVin : caveAccueil : vue = $vue");
        require ($vue);
    }

    public static function clientReadAll()
    {
        $results = ModelPersonne::getAllClient();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewAll.php';
        if (DEBUG)
            echo ("ControllerClient : clientReadAll : vue = $vue");
        require ($vue);
    }


    public static function clientLogin()
    {
        include 'config.php';
        $vue = $root . '/app/view/client/viewLogin.php';
        if (DEBUG)
            echo ("ControllerClient : clientReadAll : vue = $vue");
        require ($vue);
    }

    public static function clientLoggedIn()
    {
        $results = ModelPersonne::checkIfExists(
            htmlspecialchars($_GET['login']),
            htmlspecialchars($_GET['password'])
        );

        include 'config.php';

        if(!empty($results)) {
            foreach ($results as $element) {
                if($element["statut"] == 0) {
                    $vue = $root . '/app/view/viewCaveAccueilBoss.php';
                }
                else {
                    $vue = $root . '/app/view/viewCaveAccueilClient.php';
                }
            }
        }
        require ($vue);
    }

    public static function clientDeconnexion()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerClient : clientReadAll : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerClient -->

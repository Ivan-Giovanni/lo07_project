
<!-- ----- debut ControllerClient -->
<?php
session_start();

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
        $results_login = ModelPersonne::checkIfExists(
            htmlspecialchars($_GET['login']),
            htmlspecialchars($_GET['password'])
        );

        include 'config.php';

        if(!empty($results_login)) {
            foreach ($results_login as $element) {
                if($element["statut"] == 0) {
                    $vue = $root . '/app/view/viewCaveAccueilBoss.php';
                }
                else {
                    $vue = $root . '/app/view/viewCaveAccueilClient.php';
                }
            }
        }

        foreach ($results_login as $element) {
            $nom = $element["nom"];
            $prenom = $element["prenom"];
            $id = $element["id"];
            $statut = $element["statut"];
            $login = $element["login"];
            $password = $element["password"];
        }

        $results_login_array = ["nom" => $nom, "prenom" => $prenom, "id" => $id, "statut" => $statut, "login" => $login, "password" => $password];

        $_SESSION['user_info'] = $results_login_array;

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

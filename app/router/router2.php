<!-- ----- debut Router1 -->
<?php
require('../controller/ControllerAdminstrateur.php');
require('../controller/ControllerBanque.php');
require('../controller/ControllerClient.php');
require('../controller/ControllerCompte.php');
require('../controller/ControllerResidence.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchee
$action = htmlspecialchars($param["action"]);

// --- On supprime l'élément action de la structure
unset($param["action"]);

// --- Tout ce qui reste sont des arguments
$args = $param;


// --- Liste des méthodes autorisées
switch ($action) {
    case "clientReadAll":
    case "clientReadAllAdmin":
        ControllerClient::$action($args);
    // -----------------------------------------------//
    case "compteReadAllClient":
    case "compteReadAllBanque";
        ControllerCompte::$action($args);
    // -----------------------------------------------//
    case "residenceReadAllClient":
        ControllerResidence::$action($args);
    // -----------------------------------------------//
    case "banqueReadAll":
    case "banqueInsert":
        ControllerBanque::$action($args);

        break;

    case "mesPropositions":
        ControllerCave::$action($args);
        break;

    // Tache par défaut
    default:
        $action = "caveAccueil";
        ControllerAdministrateur::$action($args);
}
?>
<!-- ----- Fin Router1 -->
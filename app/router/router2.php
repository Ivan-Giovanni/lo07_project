<!-- ----- debut Router1 -->
<?php
require('../controller/ControllerAdminstrateur.php');
require('../controller/ControllerBanque.php');
require('../controller/ControllerClient.php');
require('../controller/ControllerCompte.php');
require('../controller/ControllerResidence.php');
require('../controller/ControllerCave.php');

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
        ControllerClient::$action($args);
        break;
    // -----------------------------------------------//
    case "adminReadAll":
        ControllerAdministrateur::$action($args);
        break;
    // -----------------------------------------------//
    case "compteReadAll":
    case "compteSelectForTransfert":
    case "transfertInitie":
        ControllerCompte::$action($args);
        break;
    // -----------------------------------------------//
    case "residenceReadAll":
    case "patrimoineReadAll":
        ControllerResidence::$action($args);
        break;
    // -----------------------------------------------//
    case "banqueReadAll":
    case "banqueInsert":
    case "banqueCreate":
    case "banqueCreated":
    case "banqueIdFound":
    case "banqueSearchIdByName":
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
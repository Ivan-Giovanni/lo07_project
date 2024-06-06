<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerAdminstrateur.php');
require ('../controller/ControllerBanque.php');
require ('../controller/ControllerClient.php');
require ('../controller/ControllerCompte.php');
require ('../controller/ControllerResidence.php');

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
  case "administrateurReadAll":
  case "administrateurReadOne":
  case "administrateurReadId":
  case "administrateurCreate":
  case "administrateurCreated":
  case "administrateurDelete":
    // --- passage des arguments au controleur
    ControllerAdministrateur::$action($args);
  case "banqueReadAll":
  case "banqueReadOne":
  case "banqueReadId":
  case "banqueCreate":
  case "banqueCreated":
  case "prodReadAllRegion":
  case "prodReadAllRegionProd":
  case "banqueDelete":
    ControllerBanque::$action($args);
  //
  case "clientRequete1":
  case "clientRequete2":
  case "ajouterClient":
  case "clientCreated":
    ControllerClient::$action($args);
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
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

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- On supprime l'élément action de la structure
unset($param["action"]);

// --- Tout ce qui reste sont des arguments
$args = $param;


// --- Liste des méthodes autorisées
switch ($action) {
  case "vinReadAll":
  case "vinReadOne":
  case "vinReadId":
  case "vinCreate":
  case "vinCreated":
  case "vinDelete":
    // --- passage des arguments au controleur
    ControllerVin::$action($args);
  case "producteurReadAll":
  case "producteurReadOne":
  case "producteurReadId":
  case "producteurCreate":
  case "producteurCreated":
  case "prodReadAllRegion":
  case "prodReadAllRegionProd":
  case "producteurDelete":
    ControllerProducteur::$action($args);
  //
  case "recolteRequete1":
  case "recolteRequete2":
  case "ajouterRecolte":
  case "recolteCreated":
    ControllerRecolte::$action($args);
    break;

  case "mesPropositions":
    ControllerCave::$action($args);
    break;

  // Tache par défaut
  default:
    $action = "caveAccueil";
    ControllerVin::$action($args);
}
?>
<!-- ----- Fin Router1 -->
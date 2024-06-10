
<!-- ----- debut ControllerResidence -->
<?php
require_once '../model/ModelResidence.php';

class ControllerResidence {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerVin : caveAccueil : vue = $vue");
        require ($vue);
    }

   public static function residenceReadAll() {
       $results = ModelResidence::getAllResidencePersonne();
       // ----- Construction chemin de la vue
       include 'config.php';
       $vue = $root . '/app/view/residence/viewAll.php';
       if (DEBUG)
           echo ("ControllerCompte : compteReadAll : vue = $vue");
       require ($vue);
   }

   public static function patrimoineReadAll()
   {
       $results = ModelResidence::getPatrimoine();
       // ----- Construction chemin de la vue
       include 'config.php';
       $vue = $root . '/app/view/residence/viewPatrimoine.php';
       if (DEBUG)
           echo ("ControllerResidence : residenceReadAll : vue = $vue");
       require ($vue);
   }

}
?>
<!-- ----- fin ControllerResidence -->

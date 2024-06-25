<!-- ----- debut ControllerBanque -->
<?php
require_once '../model/ModelBanque.php';

class ControllerBanque
{
    // --- page d'acceuil
    public static function caveAccueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewPatrimoineAccueil.php';
        if (DEBUG)
            echo("ControllerBanque : caveAccueil : vue = $vue");
        require($vue);
    }

    // --- Liste des banques
    public static function banqueReadAll()
    {
        $results = ModelBanque::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewAll.php';
        if (DEBUG)
            echo("ControllerBanque : banqueReadAll : vue = $vue");
        require($vue);
    }

    // Affiche le formulaire de creation d'un banque
    public static function banqueCreate()
    {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInsert.php';
        require($vue);
    }

    public static function banqueCreated()
    {
        $results = ModelBanque::insert(
            htmlspecialchars($_GET['label']),
            htmlspecialchars($_GET['pays'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInserted.php';
        require($vue);
    }

    public static function banqueSearchIdByName()
    {
        $results = ModelBanque::getAll();
        include 'config.php';
        $vue = $root . '/app/view/banque/viewSearchIdByName.php';
        require($vue);
    }

    public static function banqueIdFound()
    {
        $banqueId = ModelBanque::getBanqueId(
            htmlspecialchars($_GET['label'])
        );

        $results = ModelCompte::getAllCompte($banqueId);
        include 'config.php';
        $vue = $root . '/app/view/compte/viewAllCompteBanque.php';
        require($vue);
    }


    public static function banqueEtPays()
    {
        $results = ModelBanque::getAll();
        // Transformation des données pour obtenir le nombre de banques par pays
        $banquesParPays = [];
        foreach ($results as $banque) {
            $pays = $banque->getPays();
            if (!isset($banquesParPays[$pays])) {
                $banquesParPays[$pays] = 0;
            }
            $banquesParPays[$pays]++;
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInnovationBanqueEtPays.php';
        if (DEBUG)
            echo("ControllerBanque : banqueReadAll : vue = $vue");
        require($vue);
    }

}

?>
<!-- ----- fin ControllerBanque -->
<?php

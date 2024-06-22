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

    // achat d'une résidence
    public static function residenceAchat() {
        $client_id = $_SESSION['user_info']['id'];
        // update les comptes et le personne id de la résidence

        // choix de la résidence
        $results = ModelResidence::getResidence($client_id) ;
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewChoixResidence.php';
        if (DEBUG)
            echo ("ControllerResidence : residenceAchat : vue = $vue");
        require ($vue);

    }


    public static function residenceTobuy() {
        $client_id = $_SESSION['user_info']['id'];
        $residence_id = $_GET['residence_id'];


        //id de la personne qui possède la résidence
        $personne_id = ModelResidence::IdProprietaire($residence_id);
        //liste des comptes de l'acheteur , liste des comptes du vendeur,prix de la propriété
        $label_acheteur = ModelCompte::getMylabel($client_id) ;
        $label_vendeur = ModelCompte::getMylabel($personne_id);
        $prix = ModelResidence::residencePrix($residence_id) ;

        //nouvelle vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewTobuy.php';
        if (DEBUG)
            echo ("ControllerResidence : residenceTobuy : vue = $vue");
        require ($vue);
    }

    public static function residenceBought() {
        $client_id = $_SESSION['user_info']['id'];
        echo("residence_id");
        var_dump($_GET['residence_id']);

        //changer le personne id de la residence
        $resi = ModelResidence::changePersonneResidence($_GET['residence_id'],$client_id);
        //virer le montant
        $results = ModelCompte::transfer(
            htmlspecialchars($_GET['acheteur_id']),
            htmlspecialchars($_GET['vendeur_id']),
            htmlspecialchars($_GET['prix'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewBought.php';
        require ($vue);

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

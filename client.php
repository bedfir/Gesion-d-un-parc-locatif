<?php

require_once "./view/header.php";
require_once "./controller/ControllerLocatif.php";

$control = new ControllerLocatif();

if (isset($_GET["action"])) {

    switch ($_GET["action"]) {

        case 'add':
            // $control->add();
            echo "Page d'ajout de projet";
            break;
        case 'edit':
            // $control->edit();
            echo "Page de modification de projet";
            break;
        case 'remove':
            // $control->remove();
            echo "Page de supprission de projet";
            break;
        case 'list':
            $control->list();
            break;
        case 'recherche':
            // $control->research();
            echo "Page de recherche de projet";
            break;

        default:
            # TODO page non conforme aux spécifications
            echo "Page Invalide " . $_GET["action"] . "<br>";
            break;
    }
} else {
    // TODO page défaut ?
    echo "Page non définie<br>";
}


require_once "./view/footer.php";

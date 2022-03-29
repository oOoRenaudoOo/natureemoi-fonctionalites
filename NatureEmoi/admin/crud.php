<?php

include ("config.php");


if (isset($_GET["action"])){
   
    switch($_GET["action"]) {
        
        case "ajouter":

            $maRequete = "INSERT INTO `plantes` (`id`, `nom`,`description`, `prix`, `dateIns`) VALUES (NULL, '".$_POST["nom"]."', '".$_POST["description"]."', '".$_POST["prix"]."', CURRENT_TIMESTAMP)";

        break;

        case "supprimer":

            $maRequete = "DELETE FROM plantes WHERE id = ".$_GET["id"];

        break;
           
        case "modifier":
            
            $maRequete = "UPDATE `plantes` SET `nom` = `".$_POST["nom"]."`, `description` = '".$_POST["description"]."', `prix` = '".$_POST["prix"]."' WHERE `plantes`.`id` =`".$_GET["id"]."`"; 
      
        break;

        default :
           
           /* echo ($maRequete);*/

        break;

    }

    $resultat = $mysqli->query($maRequete);

}
    // redirection par defaut

    header("location: ./index.php");


?>
<?php
    $nom = "";
    $title = "Ajouter" ;
    $lienCrud ="crud.php?action=ajouter";
    $valueDesc="";
    $valuePrix="";
    $valueNom="";



    if(isset($_GET['mod']) && isset($_GET['id']) ){
    
        if ($_GET['mod'] == "modifier") {
            
            $title = "Modifier";
            $lienCrud ="crud.php?action=modifier&id=".$_GET['id'] ;

        } 
        else {
        
            $title = "Supprimer"; 
            $lienCrud ="crud.php?action=supprimer&id=".$_GET['id'] ;
        }
        

        $rqPlante = $mysqli->query("SELECT * FROM `plantes` WHERE id = '".$_GET['id']."'");

        /// var_dump($rqPlante);
        
        if ($rqPlante->num_rows > 0) {

            $row = $rqPlante->fetch_assoc();
            
            $id= $row['id'];
            $nom = $row['nom'];
            $desc = $row['description'];
            $prix = $row['prix'];

            $valueNom = "value=".'"'.$nom.'"';
            // echo $valueNom;
            $valueDesc = "value=".'"'.$desc.'"';
            //echo $valueDesc;
            $valuePrix = "value=".'"'.$prix.'"';
            //echo $valuePrix;

            if ($title == "Supprimer") {

                $valueNom = $valueNom. " disabled"; 
                $valueDesc = $valueDesc." disabled";
                $valuePrix = $valuePrix." disabled";

            }
            

        }

    }

?>


<div class="text"><?php echo $title ;?></div>


<form action="<?php echo $lienCrud ; ?>" method="post">
    <label for="">Nom de la plante</label>
    <input type="text" name="nom" <?php echo $valueNom  ?> id="<?php echo $id;?>">
    <br>
    <label for="">Description</label>
    <input type="text" name="description" <?php echo $valueDesc ?> id="">
    <br>
    <label for="">Prix</label>
    <input type="text" name="prix" <?php echo $valuePrix ?>  id="">
    <br>
    <?php 
        if($title == "Ajouter") {
            ?> <input type="submit" value="Ajouter"> <?php
        } else
            {
                if($title == "Modifier") {
                    ?> <input type="submit" value="Modifier"> <?php
                
                } else
                    {
                        ?> <input type="submit" value="Supprimer"> <?php
                    
                    }
            } 
            
            
    ?>
     
</form>

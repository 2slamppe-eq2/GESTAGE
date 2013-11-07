<?php
    // connexion Ã  la base de donÃ©es
    $db=mysql_connect('localhost','root','joliverie');
    mysql_select_db('GESTAGE',$db);
    //instantiation des variables
    $idEntreprise='';
    //rÃ©cupÃ©ration des donnÃ©e envoyer par jQuery
    if(isset($_GET['value3'])){
        $idEntreprise=$_GET['value3'];
    }
     //requete qui renvoit nom, prenom, id des maitres de stage correspondant à l'organisation sélectionnée
     $requet="SELECT p.NOM, p.PRENOM, p.IDPERSONNE ";
     $requet.="FROM PERSONNE p ";
     $requet.="INNER JOIN CONTACT_ORGANISATION c ON c.IDCONTACT = p.IDPERSONNE ";
     $requet.="WHERE c.IDORGANISATION ='".$idEntreprise. "';"; // requete pour rÃ©cupÃ©rer le contenue  du tableaux
             $requetExe=mysql_query($requet);      
            // crÃ©ation du contenue du select :
             echo"<label>Maitre de stage</label>";
             echo'<select id="choixMaitreStage" name="choixMaitreStage">';
             echo'<option value=""></option>';
            
            While ($data=mysql_fetch_assoc($requetExe))  { //boucle de ligne du tableau
                      
                   echo'<option value="'.$data['IDPERSONNE'].'">'.$data['NOM'].' '.$data['PRENOM'].'</option>';   
                   
                   
            
        }    
    
?>

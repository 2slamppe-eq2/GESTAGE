
        <?php
        //connection Ã  la base de donnÃ©e 
        $db=mysql_connect('localhost','aballeng_gestage','aballenghien');
        mysql_select_db('aballenghien_gestage',$db);
        //instantiation des variable
        $classe='';
        $option='';
        //rÃ©cupÃ©ration des variable envoyer par jquery
        if(isset($_GET['value1'])){
        $classe=$_GET['value1'];
            }
        if(isset($_GET['value2'])){
        $option=$_GET['value2'];
            }
            
             $requet="SELECT * FROM PERSONNE WHERE ETUDES='".$classe."';"; // requete pour rÃ©cupÃ©rer le contenue  du tableaux
             $requetExe=mysql_query($requet);      
            // crÃ©ation du contenue du select :
             echo"<label>choix Ã©lÃ¨ve</label>";
             echo'<select id="choixEleve" name="choixEleve">';
             echo'<option value=""></option>';
            While ($data=mysql_fetch_assoc($requetExe))  { //boucle de ligne du tableau
                      
                   echo'<option value="'.$data['IDPERSONNE'].'">'.$data['NOM'].' '.$data['PRENOM'].'</option>';   
                   
                   
            
        }
        echo"</select>";
        
        echo"<input type='submit' name='boutonEtape2' id='boutonEtape2' value='passer à  la 2eme Ã©tape' onClick='return validerStage1();'></input>";
        
        
        ?>


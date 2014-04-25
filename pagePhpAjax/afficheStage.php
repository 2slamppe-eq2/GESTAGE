<?php
    // connexion Ã  la base de donÃ©es
    $db=mysql_connect('localhost','aballeng_gestage','aballenghien');
    mysql_select_db('aballenghien_gestage',$db);
    
    //instantiation des donnÃ©e
    $recherche='';
    //rÃ©cupÃ©ration des donnÃ©e envoyer par jQuery
    if(isset($_GET['value'])){
        $recherche=$_GET['value'];
    }
    $stages = new M_ListeStages();
    $stageRecherche = $stages->getLesStagesRecherche($recherche); 
    ?>
      
    <table border="1">
        
        <tr><th><input type="button" name="annee" id="annee"value="Ann&eacute;e scolaire"/></th><th><input type="button" name="etudiant" id="etudiant" value="Etudiant"/></th>
            <th><input type="button" name="prof" id="prof"value="Professeur"/></th><th><input type="button" name="organisation" id="organisation" value="Organisation"/></th>
            <th><input type="button" name="mtrStage" id="mtrStage" value="Maitre de stage"/></th><th><input type="button" name="datedeb" id="datedeb" value="Date de début"/>
            </th><th><input type="button" name="datefin" id="datefin" value="Date de fin"/></th><th><input type="button" name="datevstage" id="datevstage" value="Date de visite de stage"/></th><th><input type="button" name="ville" id="ville" value="Ville"/>
            </th><th>DIVERS</th><th>Bilan des travaux</th><th>Ressources et outils utilisés</th><th>Commentaires</th>
            <th><input type="button" name="participationCCF" id="participationCCF" value="Participation aux CCF"/></th>
        </tr>
      <?php 
            foreach ($stageRecherche as $stages) { // boucle d'affichage de toute les entreprise
                //contenue des ligne du tableau
                if($stageRecherche->PARTICIPATIONCCF==0){
                    $participation=false;
                }else{
                    $participation = true;
                }
                   echo'<tr><td>'.$stageRecherche->ANNEESCOL.'</td><td>'.$stageRecherche->NOMETUDIANT." ".$stageRecherche->PRENOMETUDIANT.'</td><td>'.$stageRecherche->NOMPROF." ".$stageRecherche->PRENOMPROF.'</td>';
                   echo'<td>'.$stageRecherche->NOM_ORGANISATION.'</td><td>'.$stageRecherche->NOMMAITRESTAGE." ".$stageRecherche->PRENOMMAITRESTAGE.'</td><td>'.$stageRecherche->DATEDEBUT.'</td><td>'.$stageRecherche->DATEFIN.'</td><td>'.$stageRecherche->DATEVISITESTAGE.'</td>';
                   echo '<td>'.$stageRecherche->VILLE.'</td><td>'.$stageRecherche->DIVERS.'</td><td>'.$stageRecherche->BILANTRAVAUX.'</td><td>'.$stageRecherche->RESSOURCESOUTILS.'</td><td>'.$stageRecherche->COMMENTAIRES.'</td><td><input type="checkbox" disabled checked="'.$participation.'"</td></tr>';
            }
        ?>      
        
        
        
        
    </table>
             
            
             
                   
                   
            
        }    
    

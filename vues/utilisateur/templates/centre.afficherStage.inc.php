<script language="JavaScript" type="text/javascript" src="../includes/fonctionsJavascript.inc.js"> </script>
<script language="JavaScript" type="text/javascript" src="../includes/jquery.js"> </script>
<script language="JavaScript" type="text/javascript" src="../includes/ajax.inc.js"> </script>
<form>
     <h1>Tableau des entreprise</h1>
<fieldset>
    <label for="recherche">faire une recherche</label>
    <input type="text" name="recherche" id="recherche" ontextchanged="javascript:trie();"/>
    <input type="button" name="recherchevalid" id="recherchevalid" value="rechercher" onClick="javascript:trie();"/>
    <div id="tableauStageDefaut" style="overflow-x: scroll; width:570px; border:none ;">
    <table border="1">
        
        <tr><th><input type="button" name="annee" id="annee"value="Ann&eacute;e scolaire"/></th><th><input type="button" name="etudiant" id="etudiant" value="Etudiant"/></th>
            <th><input type="button" name="prof" id="prof"value="Professeur"/></th><th><input type="button" name="organisation" id="organisation" value="Organisation"/></th>
            <th><input type="button" name="mtrStage" id="mtrStage" value="Maitre de stage"/></th><th><input type="button" name="datedeb" id="datedeb" value="Date de début"/>
            </th><th><input type="button" name="datefin" id="datefin" value="Date de fin"/></th><th><input type="button" name="datevstage" id="datevstage" value="Date de visite de stage"/></th><th><input type="button" name="ville" id="ville" value="Ville"/>
            </th><th>DIVERS</th><th>Bilan des travaux</th><th>Ressources et outils utilisés</th><th>Commentaires</th>
            <th><input type="button" name="participationCCF" id="participationCCF" value="Participation aux CCF"/></th>
        </tr>
      <?php 
            foreach ($this->lesStages as $LesStages) { // boucle d'affichage de toute les entreprise
                //contenue des ligne du tableau
                if($LesStages->PARTICIPATIONCCF==0){
                    $participation=false;
                }else{
                    $participation = true;
                }
                   echo'<tr><td>'.$LesStages->ANNEESCOL.'</td><td>'.$LesStages->NOMETUDIANT." ".$LesStages->PRENOMETUDIANT.'</td><td>'.$LesStages->NOMPROF." ".$LesStages->PRENOMPROF.'</td>';
                   echo'<td>'.$LesStages->NOM_ORGANISATION.'</td><td>'.$LesStages->NOMMAITRESTAGE." ".$LesStages->PRENOMMAITRESTAGE.'</td><td>'.$LesStages->DATEDEBUT.'</td><td>'.$LesStages->DATEFIN.'</td><td>'.$LesStages->DATEVISITESTAGE.'</td>';
                   echo '<td>'.$LesStages->VILLE.'</td><td>'.$LesStages->DIVERS.'</td><td>'.$LesStages->BILANTRAVAUX.'</td><td>'.$LesStages->RESSOURCESOUTILS.'</td><td>'.$LesStages->COMMENTAIRES.'</td><td><input type="checkbox" disabled checked="'.$participation.'"</td></tr>';
            }
        ?>      
        
        
        
        
    </table>
    </div>
    <div id="tableauStageTri">
        <!-- affichage des stage trier par ce qu'a choisi l'utilisateur-->
    </div>
    <div id="tableauStageFiltre">
        <!-- affichage stage après recherche-->
    </div>
    
</fieldset>
    <input value="Imprimer" type ="button" onClick="window.print();"><!--bouton d'imprÃ©tion rapide-->
    <input type="button" value="Retour" onclick="history.go(-1);"><!--bouton de retour Ã  la pages prÃ©cÃ©dente-->
</form>
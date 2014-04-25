<script language="JavaScript" type="text/javascript" src="../includes/fonctionsJavascript.inc.js"> </script>
<script language="JavaScript" type="text/javascript" src="../includes/jquery.js"> </script>
<script language="JavaScript" type="text/javascript" src="../includes/ajax.inc.js"> </script>
<form action='index.php?controleur=utilisateur&action=afficherStage&trier=true&recherche=true' name='formulaireAfficherStage' id='FormulaireAfficherStage' method='POST'>
     <h1>Tableau des Stages enregistrés</h1>
<fieldset>
    
    <label for="recherche">faire une recherche</label>
    <!-- le bouton recherche afficher des stages par critère recherché-->
    <input type="text" name="recherche" id="recherche" />
    <input type="submit" name="recherchevalid" id="recherchevalid" value="rechercher" />
    <label for='trie' >trier par: </label>
    <select name='trie' id='trie'>
        <option value='0'>--</option>
        <option value='ANNEESCOL'>Année scolaire</option>
        <option value='pe.NOM'>Nom étudiant</option>
        <option value='pe.PRENOM'>Prénom étudiant</option>
        <option value='pp.NOM'>Nom Professeur Référant</option>
        <option value='pp.PRENOM'>Prénom Professeur Référant</option>
        <option value='ps.NOM'>Nom maitre de stage</option>
        <option value='ps.PRENOM'>Prénom maitre de stage</option>
        <option value='o.NOM_ORGANISATION'>Nom Organisation</option>
        <option value='s.DATEDEBUT'>date début du stage</option>
        <option value='s.DATEFIN'>date de fin du stage</option>
        <option value='s.DATEVISITESTAGE'>date de visite du stage</option>
        <option value='s.VILLE'>ville</option>
        <option value='s.PARTICIPATIONCCF'>participation au stage</option>
    </select>
    <input type="submit" name="buttonTrier" id="buttonTrier" value="Trier"/>
    <div id="tableauStageDefaut" style="overflow-x: scroll; width:570px; border:none ;">
        <table border="1" cellspacing="0">
        <!-- tableau qui affiche tous les stages, les boutons input permettront de trier le tableau-->
        <tr><th>Ann&eacute;e scolaire</th><th>Etudiant</th>
            <th>Professeur</th><th>Organisation</th>
            <th>Maitre de stage</th><th>Date de début</th>
            <th>Date de fin</th><th>Date de visite de stage</th><th>Ville</th>
            <th>DIVERS</th><th>Bilan des travaux</th><th>Ressources et outils utilisés</th><th>Commentaires</th>
            <th>Participation aux CCF</th>
            
        </tr>
      <?php 
      //parcours de tous les stages pour récupérer chaque information
            foreach ($this->lesStages as $LesStages) { // boucle d'affichage de toute les entreprise
                //contenue des ligne du tableau
                $participation= "oui";
                if($LesStages->PARTICIPATIONCCF=="0"){
                    $participation="non";
                }
                   echo'<tr><td>'.$LesStages->ANNEESCOL.'   </td><td>'.$LesStages->NOMETUDIANT." ".$LesStages->PRENOMETUDIANT.'   </td><td>'.$LesStages->NOMPROF." ".$LesStages->PRENOMPROF.'   </td>';
                   echo'<td>'.$LesStages->NOM_ORGANISATION.'</td><td>'.$LesStages->NOMMAITRESTAGE." ".$LesStages->PRENOMMAITRESTAGE.'   </td><td>'.$LesStages->DATEDEBUT.'   </td><td>'.$LesStages->DATEFIN.'   </td><td>'.$LesStages->DATEVISITESTAGE.'    </td>';
                   echo '<td>'.$LesStages->VILLE.'   </td><td>'.$LesStages->DIVERS.'   </td><td>'.$LesStages->BILANTRAVAUX.'   </td><td>'.$LesStages->RESSOURCESOUTILS.'   </td><td>'.$LesStages->COMMENTAIRES.'   </td><td>'.$participation.'   </td></tr>';
            }
        ?>      
        
        
        
        
    </table>
    </div>
    <div id="tableauStageTri">
        
         <!--affichage des stage trier par ce qu'a choisi l'utilisateur-->
    </div>
    <div id="tableauStageFiltre">
        
         <!--affichage stage après recherche-->
    </div>
    
</fieldset>
    <input value="Imprimer" type ="button" onClick="window.print();"><!--bouton d'imprÃ©tion rapide-->
    <input type="button" value="Retour" onclick="history.go(-1);"><!--bouton de retour Ã  la pages prÃ©cÃ©dente-->
</form>
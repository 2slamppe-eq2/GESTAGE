<form>
     <h1>Tableau des entreprise</h1>
<fieldset>
    <div style="overflow-x: scroll; width:570px;">
    <table border="1">
        
        <tr><th>Ann&eacute;e scolaire</th><th>IDETUDIANT</th><th>IDPROFESSEUR</th><th>IDORGANISATION</th><th>IDMAITRESTAGE</th><th>DATEDEBUT</th><th>DATEFIN</th><th>Date de visite de stage</th><th>VILLE</th><th>DIVERS</th><th>Bilan des travaux</th><th>Ressources et outils utilisés</th><th>Commentaires</th><th>Participation aux CCF</th></tr>
      <?php 
            foreach ($this->lesStages as $LesStages) { // boucle d'affichage de toute les entreprise
                //contenue des ligne du tableau
                   echo'<tr><td>'.$LesStages->ANNEESCOL.'</td><td>'.$LesStages->IDETUDIANT.'</td><td>'.$LesStages->IDPROFESSEUR.'</td><td>'.$LesStages->IDORGANISATION.'</td><td>'.$LesStages->IDMAITRESTAGE.'</td><td>'.$LesStages->DATEDEBUT.'</td><td>'.$LesStages->DATEFIN.'</td><td>'.$LesStages->DATEVISITESTAGE.'</td>';
                   echo '<td>'.$LesStages->VILLE.'</td><td>'.$LesStages->DIVERS.'</td><td>'.$LesStages->BILANTRAVAUX.'</td><td>'.$LesStages->RESSOURCESOUTILS.'</td><td>'.$LesStages->COMMENTAIRES.'</td><td>'.$LesStages->PARTICIPATIONCCF.'</td></tr>';
            }
        ?>      
        
        
        
        
    </table>
    </div>
    
</fieldset>
    <input value="Imprimer" type ="button" onClick="window.print()"><!--bouton d'imprÃ©tion rapide-->
    <input type="button" value="Retour" onclick="history.go(-1)"><!--bouton de retour Ã  la pages prÃ©cÃ©dente-->
</form>
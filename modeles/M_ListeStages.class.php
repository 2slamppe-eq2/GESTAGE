<?php

class M_ListeStages extends Modele {
	protected $table='STAGE';
	protected $clePrimaire='NUM_STAGE';
        
        
        /**
     * getAll
     * Lire tous les enregistrements d'une table
     * @return un tableau d'instances de la classe $this->nomClasseMetier
     */
        
        //récupère la liste de tous les stages avec les nom, prenom des étudiants, professeur, maitres de stage et nom des organisation
    function getLesStages() {
        $pdo = $this->connecter();
        // RequÃªte textuelle
        $query = "SELECT s.NUM_STAGE, s.ANNEESCOL, pe.NOM AS NOMETUDIANT, pe.PRENOM AS PRENOMETUDIANT, pp.NOM AS NOMPROF, pp.PRENOM AS PRENOMPROF, ps.NOM AS NOMMAITRESTAGE, ps.PRENOM AS PRENOMMAITRESTAGE, o.NOM_ORGANISATION, s.DATEDEBUT, s.DATEFIN, ";
        $query .= "s.DATEVISITESTAGE, s.VILLE, s.DIVERS, s.BILANTRAVAUX, s.RESSOURCESOUTILS, s.COMMENTAIRES, s.PARTICIPATIONCCF ";
        $query .="FROM ".$this->table." s ";
        $query.="INNER JOIN PERSONNE pe ON s.IDETUDIANT = pe.IDPERSONNE ";
        $query.="INNER JOIN PERSONNE pp ON s.IDPROFESSEUR = pp.IDPERSONNE ";
        $query.="INNER JOIN PERSONNE ps ON s.IDMAITRESTAGE = ps.IDPERSONNE ";
        $query.="INNER JOIN ORGANISATION o ON s.IDORGANISATION = o.IDORGANISATION ORDER BY s." . $this->clePrimaire . " DESC";
        // ExÃ©cuter la requÃªte
        $resultSet = $pdo->query($query);
        // FETCH_CLASS permet de retourner des enregistrements sous forme d'objets de la classe spÃ©cifiÃ©e
        // ici : $this->nomClasseMetier contient "Enregistrement"
        // La classe Enregistrement est une classe gÃ©nÃ©rique vide qui sera automatiquement affublÃ©e d'autant
        // d'attributs publics qu'il y a de colonnes dans le jeu d'enregistrements
        $retour = $resultSet->fetchAll(PDO::FETCH_CLASS, $this->nomClasseMetier);
        $this->deconnecter();
        return $retour;
    }
    // récupère les stages contenant la valeur de la variable recherche
    function getLesStagesRecherche($recherche){
        $pdo = $this->connecter();
        
        $query = "SELECT s.NUM_STAGE, s.ANNEESCOL, pe.NOM AS NOMETUDIANT, pe.PRENOM AS PRENOMETUDIANT, pp.NOM AS NOMPROF, ";
        $query.="pp.PRENOM AS PRENOMPROF, ps.NOM AS NOMMAITRESTAGE, ps.PRENOM AS PRENOMMAITRESTAGE, o.NOM_ORGANISATION, s.DATEDEBUT, s.DATEFIN, ";
        $query .= "s.DATEVISITESTAGE, s.VILLE, s.DIVERS, s.BILANTRAVAUX, s.RESSOURCESOUTILS, s.COMMENTAIRES, s.PARTICIPATIONCCF ";
        $query .="FROM ".$this->table." s ";
        $query.="INNER JOIN PERSONNE pe ON s.IDETUDIANT = pe.IDPERSONNE ";
        $query.="INNER JOIN PERSONNE pp ON s.IDPROFESSEUR = pp.IDPERSONNE ";
        $query.="INNER JOIN PERSONNE ps ON s.IDMAITRESTAGE = ps.IDPERSONNE ";
        $query.="INNER JOIN ORGANISATION o ON s.IDORGANISATION = o.IDORGANISATION ";
        $query.="WHERE s.ANNEESCOL='".$recherche."' OR pe.NOM='".$recherche."' OR pe.PRENOM LIKE'".$recherche."' ";
        $query.="OR pp.NOM LIKE'".$recherche."' OR pp.PRENOM LIKE'".$recherche."' OR ps.NOM LIKE'".$recherche."' ";
        $query.="OR ps.PRENOM LIKE'".$recherche."' OR o.NOM_ORGANISATION LIKE'".$recherche."' ";
        $query.="ORDER BY s." . $this->clePrimaire . " DESC";
        
         $resultSet = $pdo->query($query);
        // FETCH_CLASS permet de retourner des enregistrements sous forme d'objets de la classe spÃ©cifiÃ©e
        // ici : $this->nomClasseMetier contient "Enregistrement"
        // La classe Enregistrement est une classe gÃ©nÃ©rique vide qui sera automatiquement affublÃ©e d'autant
        // d'attributs publics qu'il y a de colonnes dans le jeu d'enregistrements
        $retour = $resultSet->fetchAll(PDO::FETCH_CLASS, $this->nomClasseMetier);
        $this->deconnecter();
        return $retour;
    }
}
?>

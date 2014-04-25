<?php

class C_Utilisateur extends Controleur{
    // affichage des coordonnÃ©e de l'utilisateur 
    function coordonees(){
        
        $this->vue->titreVue = 'Vos informations';   
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php";
        
        $lesInformations = new M_Utilisateurs();
        
        $this->vue->lesInformations = $lesInformations->getFromLogin(MaSession::get('login'));
                
        $this->vue->loginAuthentification = MaSession::get('login');
       
        $this->vue->centre = "../vues/utilisateur/templates/centre.affichermesInformations.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
    }
       // midification des coordonnÃ©e de l'utilisateur 
    function modifierCoordonees(){
        
        $this->vue->titreVue = 'Modification de vos informations';   
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php";
        
        $lesInformations = new M_Utilisateurs();
                
        $this->vue->lesInformations = $lesInformations->getFromLogin(MaSession::get('login'));
                        
        $this->vue->loginAuthentification = MaSession::get('login');
       
        $this->vue->centre = "../vues/utilisateur/templates/centre.modifierMesInformations.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
    }
    //validation de modification des donnÃ©e personelle Ã  l'utilisateur
    function validerModifierCoordonees(){
        
        $this->vue->titreVue = "Modification de mes informations";
        $utilisateur = new M_LesDonneesCreationUtilisateur();
        // prÃ©parer la liste des paramÃ¨tres
        $lesParametres = array();
        // rÃ©cupÃ©rer les donnÃ©es du formulaire
        $lesParametres["CIVILITE"] = $_POST["civilite"]; 
        $lesParametres["NOM"] = $_POST["nom"];
        $lesParametres["PRENOM"] = $_POST["prenom"];
        $lesParametres["NUM_TEL"] = $_POST["tel"];
        $lesParametres["ADRESSE_MAIL"] = $_POST["mail"];
//        $lesParametres["ETUDES"] = $_POST["etudes"];
//        $lesParametres["FORMATION"] = $_POST["formation"];
                       
        $ok = $utilisateur->update($_GET["id"], $lesParametres);
        if ($ok) {
            $this->vue->message = "Modifications enregistr&eacute;es";
        } else {
            $this->vue->message = "Echec des modifications";
        }
        $this->vue->afficher();
        
    }
    // affichage du choix de l'affichage des entrepris
    function afficherEntreprise(){
        $this->vue->titreVue = 'Entreprise ayant dÃ©jÃ  pris des stagiaires';   
        
        $this->vue->loginAuthentification = MaSession::get('login');
               
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/utilisateur/templates/centre.afficheEntreprise.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
          
          
          
      }
      //affichÃ© toute les entreprises sans critÃ©re 
    function afficherEntrepriseALL(){
        $this->vue->titreVue = 'Entreprise ayant pris dÃ©jÃ  pris des stagiaires';   
        
        $this->vue->loginAuthentification = MaSession::get('login');
        
        $lesEntreprise = new M_ListeEntreprise();
        
        $this->vue->lesEntreprise = $lesEntreprise->getAll();
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/utilisateur/templates/centre.afficheEntrepriseALL.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
      }
     //affichÃ© les entreprises triÃ©es par critÃ©res    
    function afficherEntrepriseSpec(){
        $this->vue->titreVue = 'Entreprise ayant pris dÃ©jÃ  pris des stagiaires';   
        
        $this->vue->loginAuthentification = MaSession::get('login');
        
        $lesVille = new M_ListeEntrepriseCritere();
        $this->vue->lesVilles =$lesVille->getSpeci('VILLE_ORGANISATION');
        
        $formJuri = new M_ListeEntrepriseCritere();
        $this->vue->formJuri =$formJuri->getSpeci('FORMEJURIDIQUE');
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/utilisateur/templates/centre.afficheEntrepriseSpec.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();   
          
          
      }
     //formulaire de crÃ©ation d'entreprise 
    function creerEntreprise(){
        $this->vue->titreVue = 'Creer Entreprise ';   
        
        $this->vue->loginAuthentification = MaSession::get('login');
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/utilisateur/templates/centre.creerEntreprise.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
          
          
          
      }
    //validation de crÃ©ation d'entreprise   
    function validationcreerentreprise(){
        $this->vue->titreVue = "Validation cr&eacute;ation de l'entreprise";
        $entreprise = new M_LesDonneesCreationEntreprise();
        // prÃ©parer la liste des paramÃ¨tres
        $lesParametres = array();
        $lesEntreprise = new M_ListeEntreprise();
        $countEnt="";
        $countEnt= $lesEntreprise->getCount($_POST["nom"]);
        
        $msg='';    
        //vÃ©rifie si le login est prÃ©sent dans la base de donnÃ©e si l'entreprise n'est pas dÃ©jÃ  crÃ©Ã©
       
      if($countEnt->NB=="0"){
        //mise en majuscule de la ville et de la forme juridique pour unifiÃ© ces 2 critÃ©re
        
        
        $lesParametres[0] = $_POST["nom"];
        $lesParametres[1] = strtoupper($_POST["ville"]);
        $lesParametres[2] = $_POST["ads"];
        $lesParametres[3] = $_POST["cp"];
        $lesParametres[4] = $_POST["tel"];
        $lesParametres[5] = $_POST["fax"];
        $lesParametres[6] = strtoupper($_POST["fj"]);
        $lesParametres[7] = $_POST["type"];
        
        $ok = $entreprise->insert($lesParametres);
      }else{
          $msg=' Entreprise DÃ©jÃ  enregistrÃ©';
          $ok=0;
      }
      
        if ($ok) {
            $this->vue->message = "Entreprise cr&eacute;&eacute;";
        } else {
            $this->vue->message = "Echec de l'ajout de l'entreprise.".$msg;
        }
        $this->vue->afficher();
    }
    //mettre a jours les information d'une entreprise
    function majEntreprise(){
        $this->vue->titreVue = 'Mise Ã  jour Entreprise ';   
        
        $this->vue->loginAuthentification = MaSession::get('login');
        
        $lesEntreprise = new M_ListeEntreprise();
        $this->vue->lesEntreprise = $lesEntreprise->getAll();       
       
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/utilisateur/templates/centre.majEntreprise.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
          
          
          
      }
    //validation des modification de l'entreprise
    function validerModifierEntreprise(){
        
        $this->vue->titreVue = "Modification information entreprise";
        $entreprise = new M_LesDonneesCreationEntreprise();
        // prÃ©parer la liste des paramÃ¨tres
        $lesParametres = array();
        // rÃ©cupÃ©rer les donnÃ©es du formulaire
        $lesParametres["NOM_ORGANISATION"] = $_POST["nom"];
        $lesParametres["VILLE_ORGANISATION"] = $_POST["ville"];
        $lesParametres["ADRESSE_ORGANISATION"] = $_POST["ads"];
        $lesParametres["CP_ORGANISATION"] = $_POST["cp"];
        $lesParametres["TEL_ORGANISATION"] = $_POST["tel"]; 
        $lesParametres["FAX_ORGANISATION"] = $_POST["fax"]; 
        $lesParametres["FORMEJURIDIQUE"] = $_POST["fj"]; 
        $lesParametres["ACTIVITE"] = $_POST["stage"]; 
        
        $ok = $entreprise->updateE($_POST["id"], $lesParametres);
        
        if ($ok) {
            $this->vue->message = "Modifications enregistr&eacute;es";
        } else {
            $this->vue->message = "Echec des modifications";
        }
        $this->vue->afficher();
        
    }
    // affiche la premiere page d'ajout d'un stage      
    function ajoutStage(){
        $this->vue->titreVue = 'Ajouter un stage';   
        
        $this->vue->loginAuthentification = MaSession::get('login');
        
        $lesFormations = new M_ListeFormations();
        $this->vue->lesFormations = $lesFormations->getAll(); 
       
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/utilisateur/templates/centre.ajoutStage.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
          
          
          
      }
     //deuxiÃ©me pages d'ajout d'un stage 
    function ajoutStageEtapeEntreprise(){
        $this->vue->titreVue = 'Ajouter un stage Etape 2';   
        
        $this->vue->loginAuthentification = MaSession::get('login');
        // récupération de la liste des entreprises
        $lesEntreprise = new M_ListeEntreprise();
        $this->vue->lesEntreprise = $lesEntreprise->getAll();
        //récupération de la liste des années scolaires
        $lesAnneesScol = new M_ListeAnneeScol();
        $this->vue->lesAnneesScol = $lesAnneesScol->getAll();
        // récupération de la liste des professeurs
        $lesProfesseurs = new M_ListePersonne();
        $this->vue->lesProfesseurs = $lesProfesseurs->getListeProfesseur();
        $eleve="";
        //récupération de l'id de l'élève choisi dans le formulaire précédent
        if(isset($_POST['choixEleve'])){
            $eleve = $_POST['choixEleve'];
        }
        
        $this->vue->Eleve = $eleve;
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/utilisateur/templates/centre.ajoutStageEtapeEntreprise.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();        
          
          
      }
      //validation de l'ajout d'un stage
      function validerAjoutStage(){
        
        $this->vue->titreVue = "ajout d'un stage";
        //instanciation des variables
        $stage = new M_LesDonneesCreationStage();
        $dateVStage="";
        $bilan = "";
        $ressources = "";
        $commentaire="";
        $divers="";
        // récupération des valeurs renseignées dans le formulaire
        if (isset($_POST["dateVStage"])){
            $dateVStage = $_POST["dateVStage"];
        }
        if (isset($_POST["bilan"])){
            $bilan = $_POST["bilan"];
        }
        if (isset($_POST["ressources"])){
            $ressources = $_POST["ressources"];
        }
        if (isset($_POST["commentaire"])){
            $commentaire = $_POST["commentaire"];
        }
        if (isset($_POST["divers"])){
            $divers = $_POST["divers"];
        }
        // création d'un tableau contenant toutes les valeurs à insérer
       
        $lesParametres = array();
        // rÃ©cupÃ©rer les données du formulaire
        $lesParametres[0] = $_POST["AnneeScol"];
        $lesParametres[1] = $_POST["eleveId"];
        $lesParametres[2] = $_POST["Professeur"];
        $lesParametres[3] = $_POST["choixEntrepriseStage"];
        $lesParametres[4] = $_POST["choixMaitreStage"];
        $lesParametres[5] = $dateVStage;
        $lesParametres[6] = $_POST["dateDeb"]; 
        $lesParametres[7] = $_POST["dateFin"]; 
        $lesParametres[8] = $_POST["ville"];
        $lesParametres[9] = $divers;
        $lesParametres[10] = $bilan;
        $lesParametres[11] = $ressources;
        $lesParametres[12] = $commentaire;
        $lesParametres[13] = $_POST["participation"];
         $ok = $stage->insert($lesParametres);// insertion des valeurs dans la base
        // affichage du message de réussite ou d'échec lors de l'insertion des données dans la base
        if ($ok) {
            $this->vue->message = "ajout du stage effectu&eacute;";
        } else {
            $this->vue->message = "Echec lors de l'ajout";
        }
        $this->vue->afficher();
        
    }
    //page d'affichage des stages
    function afficherStage(){
        $this->vue->titreVue = 'Ensemble des stages enregistr&eacute;s';   
        
        $this->vue->loginAuthentification = MaSession::get('login');
        
        $lesStages = new M_ListeStages();
        
        $this->vue->lesStages = $lesStages->getLesStages();
        
        $trier = getRequest("trier", false);
        if($trier){
            if(isset($_POST['trie'])){
                $trie = $_POST['trie'];
            }
            if(isset($_POST['recherche'])){
                $recherche = $_POST['recherche'];
            }
            $this->vue->lesStages = $lesStages->getLesStagesTrierRechercher($trie, $recherche);
        }
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/utilisateur/templates/centre.afficherStage.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
        
    }

}
?>

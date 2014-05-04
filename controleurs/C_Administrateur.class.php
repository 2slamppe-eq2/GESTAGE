
<?php

class C_Administrateur extends Controleur{
    
    
    // Fonction d'affichage du formulaire de création d'un utilisateur.
    function creerUtilisateur(){
        $this->vue->titreVue = 'Cr&eacute;ation d\'un utilisateur';   
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php";
        
        $lesOptions = new M_ListeOptions();
        $this->vue->lesOptions = $lesOptions->getAll();
               
        $lesRoles = new M_ListeRoles();
        $this->vue->lesRoles = $lesRoles->getAll();
        
        $lesEntreprises = new M_ListeEntreprise();
        $this->vue->lesEntreprises = $lesEntreprises->getAll();
        
        $this->vue->loginAuthentification = MaSession::get('login');
       
        $this->vue->centre = "../vues/administrateur/templates/centre.creerUtilisateur.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
    }
    
    //validation de création d'utilisateur 
    function validationcreerutilisateur(){
        $this->vue->titreVue = "Validation cr&eacute;ation de l'utilisateur";
        $utilisateur = new M_LesDonneesCreationUtilisateur();
        $contactOrganisation = new M_LesDonneesCreationContactOrganisation();
        // préparer la liste des paramètres
        $lesParametres = array();
        $lesParametresContactOrganisation = array();
        $lesLogin = new M_ListeLogin();
        $countLog="";
        $countLog= $lesLogin->getCount($_POST["login"]);
        //$this->vue->ListeLogin = $lesLogin->getCountLogin($_POST["login"]);
        $msg='';    
        //vérifie si le login est présent dans la base de donnée si il ne l'est pas l'utilisateur est créé
       
      if($countLog->NB=="0"){
        if(isset($_POST["option"])){
            $option = $_POST["option"];
        }else{
            $option = "";
        }
            
        $lesParametres[0] = null;        
        $lesParametres[1] = $utilisateur->getId('IDROLE', 'ROLE', 'LIBELLE', $_POST["role"]);
        $lesParametres[2] = $_POST["civilite"];  
        $lesParametres[3] = $_POST["nom"];
        $lesParametres[4] = $_POST["prenom"];
        $lesParametres[5] = $_POST["tel"];
        $lesParametres[6] = $_POST["mail"];
        $lesParametres[7] = $_POST["telP"];
        
        $lesParametres[8] = "";
        $lesParametres[9] = "";
        
        $lesParametres[10] = $_POST["login"];
        $lesParametres[11] = sha1($_POST["mdp"]);
        
        if($_POST["role"]=="Etudiant"){
           $lesParametres[0] = $option;
           $lesParametres[8] = $_POST["etudes"];
           $lesParametres[9] = $_POST["formation"];
           
        }
        $ok = $utilisateur->insert($lesParametres);
        
        
      }else{
          $msg=' Login déjà utilisé';
          $ok=0;
      }
        if($utilisateur->getId('IDROLE', 'ROLE', 'LIBELLE', $_POST["role"])==5){
            $lesParametresContactOrganisation[0] = $_POST["organisation"];
            $lesParametresContactOrganisation[1] = $ok;
            $lesParametresContactOrganisation[2] = $_POST["fonction"];
            $okContact = $contactOrganisation->insertSansClePrimaire($lesParametresContactOrganisation);
            
        }
        if ($ok) {
            $this->vue->message = "Utilisateur cr&eacute;&eacute;";
            if($utilisateur->getId('IDROLE', 'ROLE', 'LIBELLE', $_POST["role"])==5){
                if($okContact){
                    $this->vue->message.="<br> Contact Oragnisation cr&eacute;&eacute;";
                }else{
                    $this->vue->message.="<br> Echec de l'ajout du contact;";
                }
                
           }
                
            
        } else {
            $this->vue->message = "Echec de l'ajout de l'utilisateur".$msg;
        }
        $this->vue->loginAuthentification = MaSession::get('login');
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/utilisateur/templates/message.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher(); 
    }
   
      //affichage des étudiant
    function afficherEleve(){
        $this->vue->titreVue = 'Tout les élèves';   
        
        $this->vue->loginAuthentification = MaSession::get('login');
        
        $lesFormations = new M_ListeFormations();
        $this->vue->lesFormations = $lesFormations->getAll();
        
       
        
        $this->vue->entete = "../vues/templates/entete.inc.php"; 
                
        $this->vue->gauche = "../vues/templates/gauche.inc.php"; 
        
        $this->vue->centre = "../vues/administrateur/templates/centre.afficherEleve.inc.php";
        
        $this->vue->pied = "../vues/templates/pied.inc.php";
        
        $this->vue->afficher();
          
          
          
      }
      
}    
?>
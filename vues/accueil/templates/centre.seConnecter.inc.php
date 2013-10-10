<!-- VARIABLES NECESSAIRES -->
<!-- $this->message : Ã  afficher sous le formulaire -->
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<form method="post" action=".?controleur=accueil&action=authentifier">
    <fieldset>
        <label for="login">login :</label>
        <input type="text" name="login" id="login" autofocus></input><br/>
        <label for="mdp">mot de passe :</label>
        <input type="password" name="mdp" id="mdp"></input><br/>
        <input type="submit" value="Valider" ></input><br/>
<?php
if (isset($this->message)) {
    echo "<strong>".$this->message."</strong>";
}
?>
    </fieldset>
</form>

<!-- VARIABLES NECESSAIRES -->
<!-- $this->message : Ã  afficher sous le formulaire -->
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<h3>Bienvenue sur le site de gestion des stages GestStages</h3>
<?php
if (isset($this->message)) {
    echo "<strong>" . $this->message . "</strong>";
}
?>

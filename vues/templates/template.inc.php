<!DOCTYPE html >
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<html lang="fr">
    <head>
        <meta  content="text/html;charset=UTF-8" />
        <link rel="stylesheet" href="../vues/css/styleLargeurFixe.css" />
        <link rel="stylesheet" href="../vues/css/entete.css" />
        <link rel="stylesheet" href="../vues/css/menu.css" />
        <link rel="stylesheet" href="../vues/css/centre.css" />
        <title><?php echo $this->titreVue; ?></title>
    </head>
    <body>
            <header>
               <?php include("$this->entete"); ?>
            </header>
            <nav>
               <?php include("$this->gauche"); ?>
            </nav>
            <section>
                <?php include("$this->centre");?>
            </section>
            <footer>
                <?php include("$this->pied");?>
            </footer>
    </body>
</html>

<!DOCTYPE html>
<!--
Ici se trouve le layout (template) créé pour servire de structure au autres pages
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php if($home == 1){echo "";}else{ echo "../";}?>Ressources/Oiseau_Quadri.png" type="image/gif">
        <title><?php echo $title ?></title>
        
        <!--Bootstrap & Jquery call -->
        <script src="<?php if($home == 1){echo "";}else{ echo "../";}?>Model/javascript/jquery-1.12.3.min.js"></script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        
        <link rel="stylesheet" href="<?php if($home == 1){echo "";}else{ echo "../";}?>Vue/style/css3D.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <?php echo $head1 ?>

    <link rel="stylesheet" type="text/css" href="<?php if($home == 1){echo "";}else{ echo "../";}?>Vue/style/main.css">
    <link rel="stylesheet" type="text/css" href="<?php if($home == 1){echo "";}else{ echo "../";}?>Vue/style/css3D.css">
    <link rel="stylesheet" type="text/css" href="<?php if($home == 1){echo "";}else{ echo "../";}?>Vue/style/zoomGallerie.css">
</head>
<body>
    <a href="#" class="back-to-top hidden-xs">Back to Top</a>
    <div id = "header">
        <div class="container-fluid"><a href = "<?php if($home == 1){echo "";}else{ echo "../";}?>index.php"><div class="row"><img src = "<?php if($home == 1){echo "";}else{ echo "../";}?>Ressources/banner.svg" style="width: 100%; max-width: 550px;"/></div></a></div><!-- Need to create  a custom one -->
        <nav class="navbar navbar-inverse" id = "navBar">
            <div class="container-fluid" id = "menuBar">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php if($home == 1){echo "";}else{ echo "../";}?>index.php" style="font-size: 24px;">Accueil</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="text-align: left;">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recherche <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php if($home == 1){echo "";}else{ echo "../";}?>Controlleur/rechAvc.php">Recherche Avancée</a></li>
                                <li><a href="<?php if($home == 1){echo "";}else{ echo "../";}?>Controlleur/rechGroupeChi.php">Recherche par groupes</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion de la base <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php if($home == 1){echo "";}else{ echo "../";}?>Controlleur/creaGroupe.php">Groupe chimique</a></li>
                                <li><a href="#">Ajout d'un échantillon</a></li>
                            </ul>
                        </li>
                    </ul>
                    <hr class="hidden-sm hidden-lg hidden-md" />
                    <ul class="nav navbar-nav navbar-right" style="margin: 0px; padding: 0px;">
                        <li><a href="<?php if($home == 1){echo "";}else{ echo "../";}?>Controlleur/connexion.php" class="glyphicon glyphicon-user"><span style="margin-left: 10px;">Connexion</span></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    
    <div class = "container-fluid">
        <div id = "corps" class = "col-sm-10 col-sm-offset-1">
            <?php echo $content ?>
        </div>
    </div>
    <br /><br /><br /><br />


    <div id = "footer" class="hidden-xs">
        2016 - 2017 <b> Laboratoire ArAr. Archéologie et Archéométrie</b> - Tout droit réservé. Créé par <b><a href="https://panclette-studio.itch.io/" style="color: white;">Bryan Boni</a></b> & <b>Gabriel Coutu</b>
    </div>

    <!-- IMPORTANT BUT NOT USED
    <script src = "../Model/javascript/file.js"></script>-->
    <?php echo $head ?>
    <script src="<?php if($home == 1){echo "";}else{ echo "../";}?>Model/javascript/backOnTop.js"></script>
</body>
</html>

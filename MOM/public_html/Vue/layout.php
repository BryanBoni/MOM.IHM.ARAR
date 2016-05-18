<!DOCTYPE html>
<!--
Ici se trouve le layout (template) créé pour servire de structure au autres pages
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../Ressources/favicon.ico" type="image/gif">
        <title><?php echo $title ?></title>
        <!--Bootstrap & Jquery call -->
        <script src="../Model/javascript/jquery-1.12.3.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

        <link rel="stylesheet" href="../Vue/style/css3D.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <?php echo $head1?>
        
    </head>
    <link rel="stylesheet" type="text/css" href="../Vue/style/main.css">
    <link rel="stylesheet" type="text/css" href="../Vue/style/css3D.css">
</head>
<body>
    <a href="#" class="back-to-top hidden-xs">Back to Top</a>
    <div id = "header">
        <a href = "http://www.arar.mom.fr/"><img src = "../Ressources/image.gif" style = "width: 400px; height: 60px;"/></a><!-- Need to create  a custom one -->
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
                    <a class="navbar-brand" href="../index.php" style="font-size: 24px;">Accueil</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li style="text-align: center;"><a href="rechAvc.php">Recherche Avancée</a></li>
                        <li style="text-align: center;"><a href="../Controlleur/Interne.php">Interne </a></li>
                    </ul>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group" >
                                    <input type="text" class="form-control" placeholder="Ajouter à la recherche" name ="search"/>
                                </div>                    
                                <button type="submit" class="btn btn-default " ><b class = "glyphicon glyphicon-search"></b></button>
                            </form>
                        </li>

                        <li style="text-align: center;"><a href="../Controlleur/connexion.php"><p class="glyphicon glyphicon-user" style="margin: 0px;"> </p><p class ="hidden-sm hidden-md hidden-lg">Utilisateur</p></a></li>
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

    
    <div id = "footer">
        2016 <b>Laboratoire ArAr. Archéologie et Archéométrie</b> - Tout droit réservé. Créé par <b>Bryan Boni</b> & <b>Gabriel Coutu</b>
    </div>
    
    <!-- IMPORTANT BUT NOT USED
    <script src = "../Model/javascript/file.js"></script>-->
    <?php echo $head ?>
    <script src="../Model/javascript/backOnTop.js"></script>
</body>
</html>

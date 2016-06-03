<!DOCTYPE html>
<!--  -->
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="Ressources/favicon.ico" type="image/gif">
        <title>Laboratoire ArAr | Ceramom BDD</title>

        <!--Bootstrap & Jquery call -->
        <script src="Model/javascript/jquery-1.12.3.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="Vue/style/main.css">
    </head>

    <body>

    <center>
        <h1>Base de données Ceramom</h1>
        <br /><br />
        <img src = "Ressources/poterie.png" style = "width: 150px;"/>
        <br /><br />
        <div id = "titleIndex" class = "col-sm-offset-3 col-sm-6">
            <form action = "Controlleur/rechAvc.php" method = "get">
                <div class = "input-group">
                    <span class = "input-group-addon" id = "basic-addon1"><b>Recherche :</b></span>
                    <input type = "text" name = "search" aria-describedby = "basic-addon1" class = "form-control" id = "searchTxt" placeholder = "Je recherche..."/>
                    <span class="input-group-btn">
                        <button  id = "searchBtn" class = "btn btn-danger " name = "searchBtn" type = "submit"><span class = "glyphicon glyphicon-search"/></button>
                    </span>
                </div>
               <input type = "hidden" name="display" value="ImageText"/>
                <?php
                    $_SESSION['nbPage'] = 15;
                    $_SESSION['display'] = "ImageText";
                ?>
            </form>
        </div>
    </center>
</body>
</html>
<!DOCTYPE html>
<!--
Ici se trouve le layout (template) créé pour servire de structure au autres pages
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../Ressources/Oiseau_Quadri.png" type="image/gif">
        <title>Tableau détailé des échantillons</title>

        <!--Bootstrap & Jquery call -->
        <script src="../Model/javascript/jquery-1.12.3.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

        <link rel="stylesheet" href="../Vue/style/css3D.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="../../Vue/style/main.css">
        <link rel="stylesheet" type="text/css" href= "../../Vue/style/css3D.css">
        <link rel="stylesheet" type="text/css" href="../../Vue/style/zoomGallerie.css">
    </head>
    <body>
        <a href="#" class="back-to-top hidden-xs">Back to Top</a>
        <div id = "header">

        </div>

        <div class = "container-fluid">
            <a href="../detailsGroupe.php"><b><-- Retour précédent</b></a>
            <div class="row" id="cahierTable">
                <br />
                <center>
                    <table>
                        <thead>
                            <tr>
                                <th> Nom objet </th> <th>Nature objet</th> <th>Nature sous-objet</th> <th>Num analyse</th> <th>Provenance</th> <th>Origine supposée</th> <th>Attribution</th> <th>Description</th> <th>Datation</th> <th>Stockage tessonnier</th> <th>Super groupe</th> <th>Biblio</th> <th>Docu graphiques</th> <th>Statut juridique</th>
                            </tr>
                        <thead>
                        <tbody>
                            <?php
                            $content = "";
                            
                            for($i = 0; $i < 100; $i++){
                                $content .= ""
                                        . "<tr>"
                                            . "<td> LEV$i </td> <td>Poterie </td> <td>Pâte</td> <td>AMG $i</td> <td>Lyon, Rhône, Bellecour, US 851 16003</td> <td>inconnue </td> <td>inconnue</td> <td>AMP, Dr 2/4</td> <td>Medieval</td> <td>labo, pièce géologique, armoire marron côté gauche, carton GDR</td> <td>Novy Svet Ware</td> <td> n/a </td> <td> n/a </td> <td> n/a </td> "
                                        . "</tr>";
                            }

                            echo $content;
                            ?>
                        </tbody>
                    </table>
                </center>
            </div>
        </div>
        <br /><br /><br /><br />


        <div id = "footer" class="hidden-xs">
            2016 - 2017 <b> Laboratoire ArAr. Archéologie et Archéométrie</b> - Tout droit réservé. Créé par <b><a href="https://panclette-studio.itch.io/" style="color: white;">Bryan Boni</a></b> & <b>Gabriel Coutu</b>
        </div>

        <script src="../../Model/javascript/backOnTop.js"></script>
    </body>
</html>
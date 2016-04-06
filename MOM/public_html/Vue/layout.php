<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../Ressources/favicon.ico" type="image/gif">
        <title><?php echo $title ?></title>
        <!--Bootstrap & Jquery call -->
        <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script></head>
        <link rel="stylesheet" type="text/css" href="../Vue/style/main.css">
</head>
<body>
    <div id = "header"></div>
    <div id = "corps"><?php echo $content ?></div>
    <div id = "footer"></div>
</body>
</html>

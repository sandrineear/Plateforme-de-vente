<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8" />

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Merriweather&family=Poppins:wght@200&display=swap" rel="stylesheet" type="text/css">

    <style>
        h1{
            font-family: "Work Sans";
            font-size: 45px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 4%;
        }
		
        body{
            padding:3%;
            text-align: center;
        }
		
        a:hover { text-decoration: none; }
		
        a {
            color: rgb(120,120,125);
            padding: 1rem;
            margin-right: auto;
            margin-left: auto;
            border: 1px solid rgb(120,120,125);
            text-transform: uppercase;
            font-size: 15px;
        }
		
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class ="container">
        <div class="row"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1>Welcome</h1>
				<img src = "img/shoponline.jpg"/>
                <p>
                    <a href="login.php"> Se connecter</a>
                    <a href="adduser.php"> S'inscrire</a>
                    <a href="logout.php">Se déconnecter</a>
                </p>
            </div>
        </div>
    </div>
<?php require('include/footer.php'); ?>

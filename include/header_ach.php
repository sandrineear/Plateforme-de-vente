<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SHOP</title>

    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Merriweather&family=Poppins:wght@200&display=swap" rel="stylesheet" type="text/css">
    
    <style>
        .titre {
            text-align : center;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size : 3rem;
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        body {
            font-family: "Lato";
            padding : 3%;
        }
        li { letter-spacing: 1.5px; }
        a:hover {
            color: teal;
            text-decoration: none;
        }
		img {
			max-width: 25%;
            height: auto;
			border-radius: 50%;
		}
    </style>
</head>
<body> 
    <nav role="navigation" class="navbar navbar-default" style="border:none;">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand">SHOP</a>
        </div>
        
		<ul class="nav navbar-nav" style = "text-align: center">
			<li><a href="pageacheteur.php"><span class="glyphicon glyphicon-home"></span> HOME </a></li>
			
			<li><a href= "food_a.php"><span class="glyphicon glyphicon-cutlery"></span> Alimentaires </a></li>
			
			<li><a href= "toy_a.php"><span class="glyphicon glyphicon-tower"></span> Jouets </a></li> 
			
			<li><a href= "clothe_a.php"><span class="glyphicon glyphicon-tag"></span> Vêtements </a></li> 
		</ul>
            
		<form method = "GET" role="search" class="navbar-form navbar-right">
			<span class="glyphicon glyphicon-search"></span>
			
			<div class="form-group">
				<input type="text" name="q" placeholder="Recherche" class="form-control" value "">
				<input type ="submit" class="btn btn-secondary btn-sm" value = "Search"/>
			</div>
			
			<a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier </a>
			
			<a href="mescommandes.php"><span class="glyphicon glyphicon-list-alt"></span> Mes commandes </a>
			
			<a href="info.php"><span class="glyphicon glyphicon-user"></span> Profil </a>
			
			<a href="logout.php"><span class="glyphicon glyphicon-off"></span></a>	
		</form>
    </nav>

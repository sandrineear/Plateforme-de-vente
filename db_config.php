<?php 
	$host = 'localhost:3306';
	$username= 'root';
	$db = 'projet';
	$password = 'root';
	
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
    
    try { 
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
    } catch(PDOException $e) {
        exit("Erreur de connexion" .$e->getMessage());
    }


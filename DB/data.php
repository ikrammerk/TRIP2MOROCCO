<?php

//Maitre la connexion avec avec la base de données: 

$encoding = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);
//tableu errors qui va contenir des msgs d'erreurs lors de tretement des formulaire
$errors=array();

$pdo = new PDO('mysql:dbname=trip2morocco;host=localhost','root','',$encoding);

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);









?>
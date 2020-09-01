<?php  
// recuperation de donnee d'apres l'adresse url
$client_id = $_GET['id'];
$confirme = $_GET['confirme'];
require_once'data.php'; 
//requete pour chercher les information sur les clients
$requete = $pdo->prepare('SELECT * FROM client WHERE id = ? ');
$requete->execute([$client_id]);
$client = $requete->fetch();


session_start();
// confirmation de rediction vers la page principale
if ($client && $client->confirmation == $confirme) {
//update des donnée au nv de la BD 
	$pdo->prepare('UPDATE client SET confirmation = "OUI", confirme_date = NOW() WHERE id = ?')->execute([$client_id]);
	$_SESSION['auth'] = $client;
	$_SESSION['id']= $client_id;
	$_SESSION['flash']['success'] = "Votre compte a  été bien validé";
	header('location: ../index.php');
//Dans le cas ou le client a déja confirmez son compte 	
}else if ($client->confirmation == "OUI") {
	$_SESSION['auth'] = $client;
	$_SESSION['id']= $client_id;
	$_SESSION['flash']['success'] = "Votre compte a  été bien validé";
	header('location: ../index.php');

}







?>
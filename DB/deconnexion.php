<?php

//condition de déconnexion
session_start();

unset($_SESSION['auth']);
unset($_SESSION['id']);
$_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté';
header("Location: ../index.php");

?>

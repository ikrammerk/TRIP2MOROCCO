<?php require_once'../DB/data.php';



session_start();



if (isset($_SESSION['id'])) {
 $req = $pdo->prepare('SELECT * FROM client WHERE id = ? ' );
 $req->execute([$_SESSION['id']]);
 $recherche = $req->fetch();

}



if (isset($_POST['submit1'])) {


//etude de cas if isset... designe que la reservation va etre faite par Un cient déja inscrit
  if (isset($_SESSION['id'])) {
//condition des shamps
    if (empty($_POST['ville'])  || empty($_POST['nombre_Personne'])  || empty($_POST['choix_en_famille']) || empty($_POST['equipement']) || empty($_POST['assistant']) || empty($_POST['destination']) || empty($_POST['date_debut']) || empty($_POST['date_fin'])) {

      $errors['Fname'] = '<i class="fa fa-times"></i> Tout les shamps doivent etre remplis';
    }

    if ( $_POST['nombre_Personne'] == "plusieurs" && empty($_POST['nombreP'])) {

      $errors['nombre'] = 'Presisez s\'il vous plait le nombre de personnes';
    }




    if (empty($errors)){
//requete pour inserer les donnee dans la BD
      $insertion = $pdo->prepare("INSERT INTO reservation SET prenom=?,nom=?,email=?,numéro_tele=?,ville=?,Nombre_Personne=?,trip_en_famille=?,equipements=?, assistant=?,destination=?,Date_debut=?,Date_fin=?,id_client=?,is_client=?");
// les variable a executez dans la requete
      $Firstname = $recherche->prenom;
      $Lastname =  $recherche->nom;
      $email = $recherche->email;
      $NumTele =  $recherche->numéro_de_télé;
      $ville = $_POST['ville'];

      if ($_POST['nombre_Personne'] != "plusieurs") {
       $Nombre_Personne =  $_POST['nombre_Personne'];
     }
     else{
      $Nombre_Personne =  $_POST['nombreP'];
    }

    $trip_famille =  $_POST['choix_en_famille'];
    $equipements = $_POST['equipement'];
    $assistant = $_POST['assistant'];
    $destination = $_POST['destination'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $id_client = $_SESSION['id'];
    $is_client = "OUI";

    $insertion->bindValue(1, $Firstname);
    $insertion->bindValue(2, $Lastname);
    $insertion->bindValue(3, $email);
    $insertion->bindValue(4, $NumTele);
    $insertion->bindValue(5, $ville);
    $insertion->bindValue(6, $Nombre_Personne);
    $insertion->bindValue(7, $trip_famille);
    $insertion->bindValue(8, $equipements);
    $insertion->bindValue(9, $assistant);
    $insertion->bindValue(10, $destination);
    $insertion->bindValue(11, $date_debut);
    $insertion->bindValue(12, $date_fin);
    $insertion->bindValue(13, $id_client);
    $insertion->bindValue(14, $is_client);
    $insertion->execute();

 //le style et le contenue associer de confirmation d'email
    $header="MIME-Version: 1.0\r\n";
    $header.='Content-Type:text/html; charset="UTF-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $message= '
    <html>
    <body>
    <div align="center" style="margin:0;padding:0;width:100%;background-color:#303036">

    <div align="center" >
    <br>
    <div border="0" style="margin:0;padding:0" >

    <table border="0" cellpadding="0" cellspacing="0" width="600" style="border:1px ;background-color:#303036;max-width:600px">
    <tr>
    <td style="margin:0;padding:10px 40px;background:#303036;">
    <center><strong style="color:#d3d3d3;text-transform:uppercase;font-family: cursive;letter-spacing: 9px;">
    <span style="color:#05f7ff">TRIP2</span>MOROCCO</strong></center>
    </td>
    </tr>
    </table>
    </div><br>


    <div style="background-color:#303036;width: 80.5%;">
    <table border="0" cellpadding="0" cellspacing="0" width="600" style="border:1px;background-color:#303036;max-width:600px">

    <div style="color:#d3d3d3;font-family:Verdana,Geneva,sans-serif;font-size:100%;line-height:150%;text-align:center;word-wrap:break-word">

    <br>
    <p style="margin-left: 15px; margin-top: 12px;">Félicitations! Votre réservation est validée. Vous receverez bientôt une fiche d\'informations concernant le voyage.
    Pour tout changement ou annulation veuillez nous contacter via notre e-mail adresse<strong> trip2morocco@gmail.com</strong></p>
    <p>Passez une tres bonne journée!</p>
    <p>Equipe<strong> TRIP2MOROCCO</strong></p>

    </table><br></div></div>

    <br>
    </div>
    </body>
    </html>

    ';


    mail($email,'A propos de reservation',$message,$header);

    $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé sur votre boite email pour obtenir plus d\'informations vsur votre reservation';
    header('location: form.php');
    exit();

  }


}
/*le else designe le cas contraire ou la reservation est faite par utilisateur normale mais qui n'est pas inscrit
Reste a retenir que le traitement et le meme sauf que le style de chaque reservation et du l'email n'est pas le meme
*/
else {

  if (empty($_POST['Fname']) || empty($_POST['Lname'])  || empty($_POST['Mnum']) ||  empty($_POST['ville']) ||  empty($_POST['nombre_Personne']) || empty($_POST['choix_en_famille']) || empty($_POST['equipement'])
    || empty($_POST['assistant']) || empty($_POST['destination']) || empty($_POST['date_debut']) || empty($_POST['date_fin'])){

    $errors['Fname'] = '<i class="fa fa-exclamation-triangle"></i> Tout les shamps doivent etre remplis';

}

if ( $_POST['nombre_Personne'] == "plusieurs" && empty($_POST['nombreP'])) {

  $errors['nombre'] = 'Presisez s\'il vous plait le nombre de personnes';
}

if (empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
 $errors['email']="Votre email est invalide";
}

//recherche de l'email dans la BD
$requete = $pdo->prepare('SELECT * FROM reservation WHERE email = ?');
$requete->execute([$_POST['email']]);
$email_Pré_existant = $requete->fetch();



if ($email_Pré_existant){
  $errors['connexion'] = '<i class="fa fa-exclamation-triangle"></i> Vous etes déja inscrit avec cette adresse email.Veuillez vous etre connecter pour reservez avec ce mail';
}



if (empty($errors)){

  $insertion = $pdo->prepare("INSERT INTO reservation SET prenom=?,nom=?,email=?,numéro_tele=?,ville=?,Nombre_Personne=?,trip_en_famille=?,equipements=?, assistant=?,destination=?,Date_debut=?,Date_fin=?,is_client=?");
  $Firstname = $_POST['Fname'];
  $Lastname = $_POST['Lname'];
  $email = $_POST['email'];
  $NumTele = $_POST['Mnum'];
  $ville = $_POST['ville'];

  if ($_POST['nombre_Personne'] != "plusieurs") {
   $Nombre_Personne =  $_POST['nombre_Personne'];
 }
 else{
  $Nombre_Personne =  $_POST['nombreP'];
}



$trip_famille =  $_POST['choix_en_famille'];
$equipements = $_POST['equipement'];
$assistant = $_POST['assistant'];
$destination = $_POST['destination'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$is_client = "NON";

$insertion->bindValue(1, $Firstname);
$insertion->bindValue(2, $Lastname);
$insertion->bindValue(3, $email);
$insertion->bindValue(4, $NumTele);
$insertion->bindValue(5, $ville);
$insertion->bindValue(6, $Nombre_Personne);
$insertion->bindValue(7, $trip_famille);
$insertion->bindValue(8, $equipements);
$insertion->bindValue(9, $assistant);
$insertion->bindValue(10, $destination);
$insertion->bindValue(11, $date_debut);
$insertion->bindValue(12, $date_fin);
$insertion->bindValue(13, $is_client);
$insertion->execute();

$lien= 'http://localhost/TRIP2MOROCCO/SUBSCRIBE/inscription.php';
$header="MIME-Version: 1.0\r\n";
$header.='Content-Type:text/html; charset="UTF-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';
$message='

<html>
<body>
<div align="center" style="margin:0;padding:0;width:100%;background-color:#303036">

<div align="center" >
<br>
<div border="0" style="margin:0;padding:0" >

<table border="0" cellpadding="0" cellspacing="0" width="600" style="border:1px ;background-color:#303036;max-width:600px">
<tr>
<td style="margin:0;padding:10px 40px;background:#303036;">
<center><strong style="color:#d3d3d3;text-transform:uppercase;font-family: cursive;letter-spacing: 9px;">
<span style="color:#05f7ff">TRIP2</span>MOROCCO</strong></center>
</td>
</tr>
</table>
</div><br>


<div style="background-color:#303036;width: 80.5%;">
<table border="0" cellpadding="0" cellspacing="0" width="600" style="border:1px;background-color:#303036;max-width:600px">

<div style="color:#d3d3d3;font-family:Verdana,Geneva,sans-serif;font-size:100%;line-height:150%;text-align:center;word-wrap:break-word">

<br>
<p style="margin-left: 15px; margin-top: 12px;">Félicitations! Votre réservation est validée. Vous receverez bientôt une fiche d\'informations concernant le voyage.
Pour tout changement ou annulation veuillez nous contacter via notre e-mail adresse<strong> trip2morocco@gmail.com</strong><br>
Nous vous invitons à s\'inscrire à notre site pour béneficier de tous nos services ainsi que des réductions spéciales pour nos nouveaux clients. Tout en cliquant sur le lien ci dessous.</p>
<p>Passez une tres bonne journée!</p>
<p>Equipe<strong> TRIP2MOROCCO</strong></p>
<div>

<br>
<center>
<a href="'.$lien.'" style="background-color:#05f7ff;border-radius:9px ;color:white;font-family:cursive;font-size:13px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:250px;
padding: 17px 17px 17px 17px">
Inscrivez vous des maintenant!
</a>
</center>
<br>
</div>

</table><br></div></div>

<br>
</div>
</body>
</html>


';


mail($_POST['email'],'A propos de reservation',$message,$header);

$_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé sur votre boite email pour obtenir plus d\'informations vsur votre reservation';
header('location: form.php');
exit();

}

}

}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>RESERVATION</title>
  <link rel="stylesheet" href="styleform.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="main">
    <div class="logo1">
      <img src="2.png">
    </div>
    <ul style="padding: 30px">
     <?php  if (isset($_SESSION['id']) ) :?>
       <ul>
         <li><img style="width: 40px;
         height: 40px;
         border-radius: 50%;
         margin-top: 22px;"
         src="../photos/guest.png"></li>
       </ul>
       <ul>
         <li><p style="color: white;font-size: 18px; margin-top: 28px;margin-right:15px; font-family: SourceSansPro;"><?php echo $recherche->prenom.' '.$recherche->nom;   ?></p></li>
       </ul>
     <?php endif;?>
     <li ><a href="../index.php"><i class="fa fa-home"></i>ACCEUIL</a></li>
     <li><a href="#"><i class="fa fa-map-marker"></i> DESTINATION</a>
      <div class="submemu1">
      <ul>
          <li><a href="http://localhost/TRIP2MOROCCO/destinations/plage.php">Plage</a> </li>
							<li><a href="http://localhost/TRIP2MOROCCO/destinations/montagne.php">Montagne</a> </li>
							<li><a href="http://localhost/TRIP2MOROCCO/destinations/cascade.php">Cascade</a> </li>
							<li><a href="http://localhost/TRIP2MOROCCO/destinations/valley.php">Vallée</a> </li>
							<li><a href="http://localhost/TRIP2MOROCCO/destinations/sahara.php">Sahara</a> </li>
						</ul>
					</div>
					<li><a href="#"><i class="fa fa-cart-arrow-down"></i> MAGAZIN</a>
						<div class="submemu1">
							<ul>
								<li class="hover-me"><a href="#">Equipement</a>
									<div class="submenu2">
										<ul>
											<br>
											<li> <a href="http://localhost/TRIP2MOROCCO/store/blog.php">Achat</a>
												<li> <a href="http://localhost/TRIP2MOROCCO/location/location.php">location</a> </li>
											</ul>
										</div>
									</li>
									<li><a href="http://localhost/TRIP2MOROCCO/book/boooks.php">Livres</a> </li>
								</ul>
							</div>
						</li>
					</li>
					<ul>
						<li><a href="http://localhost/TRIP2MOROCCO/reservation/form.php"><i class="fa fa-book"></i>RESERVATION</a></li>
						<li><a href="http://localhost/TRIP2MOROCCO/CONSEIL/CONSEIL.php"><i class="fa fa-heart"></i>CONSEILS</a>

						</li>


     <!--<li class="active"><a href="#"><i class="fa fa-book"></i>RESERVATION</a></li>
     <li><a href="http://localhost/TRIP2MOROCCO/CONSEIL/CONSEIL.php""><i class="fa fa-heart"></i>CONSEILS</a>
-->
     </li>


     <?php  if (isset($_SESSION['id']) ) :?>

      <li ><a href="http://localhost/TRIP2MOROCCO/DB/deconnexion.php"><i class="fa fa-sign-in"></i>DECONNEXION</a></li>


      <?php  else: ?>

        <li><a href="http://localhost/TRIP2MOROCCO/SUBSCRIBE/connexion.php"><i class="fa fa-sign-in"></i>CONNEXION</a></li>

      <?php endif;?>
    </ul>
  </div>
  <br><br><br><br>
  <h1>RESERVATION</h1>
  <div class="register">
    <h2>Reservez Ici  :</h2>


    <!--controle d'erreurs-->


    <?php  if (!empty($errors)):?>

      <center><div  class="alert alert-danger">
        <strong>Vous n'avez pas remplir  le formulaire  correctement</strong>
        <ul>
          <?php foreach ($errors as $error): ?>
           <li><?= $error; ?></li>
         <?php endforeach; ?>
       </ul>
     </div>
   </center>
 <?php endif; ?>

 <!--les mesdsages flash-->

 <?php if (isset($_SESSION['flash'])): ?>

   <?php foreach ($_SESSION['flash'] as $type => $message): ?>

     <div class="alert alert-<?=$type; ?>"><li><?=$message; ?> </li></div>

   <?php endforeach; ?>
   <?php unset($_SESSION['flash']); ?>

 <?php endif;?>




 <?php  if (isset($_SESSION['id']) ) :?>

  <form id="register" action="" method="POST" onclick="ValidationForm1()">


   <label> Ville :</label><br>
   <select id="ville" name="ville" >
    <option value="default">Choisir votre ville</option>
    <option value="marrakech">marrakech</option>
    <option value="rabat">rabat</option>
    <option value="oujda">oujda </option>
    <option value="agadir">agadir</option>
    <option value="safi">safi</option>
    <option value="casablanca">casablanca</option>
    <option value="azilal">azilal</option>
    <option value="salé">salé</option>
    <option value="tanger">tanger</option>
    <option value="meknès">meknès</option>
    <option value="kénitra">kénitra</option>
    <option value="tétouan">tétouan</option>
    <option value="mohammédia">mohammédia</option>
    <option value="khoribga">khoribga</option>
    <option value="el jadida">el jadida</option>
    <option value="béni mallal">béni mallal</option>
    <option value="taza">taza</option>
    <option value="khémisset">khémisset</option>
    <option value="taourirt">taourirt</option>
    <option value="dakhla">dakhla</option>
  </select><br>
  <span id="errville"></span><br><br>

  <label> Nombre de personne:</label><br>
  &nbsp;&nbsp;<input type="radio" value="1" name="nombre_Personne" id="nombre" ><span id="male">&nbsp; une seule personne</span><br>
  &nbsp;&nbsp;<input type="radio" value="2" name="nombre_Personne" id="nombre" ><span id="male">&nbsp; deux personnes</span><br>
  &nbsp;&nbsp;<input type="radio"  value="plusieurs" name="nombre_Personne" id="nombre" ><span id="male">&nbsp; plus que deux personnes</span><br><br>
  <input type="text" name="nombreP" id="name" placeholder="veuillez preciser le nombre" class="nombreP1"><br>
  <span id="errnombre"></span>
  <br><br>
  <label> Trip en famille </label><br>
  &nbsp;&nbsp;<input type="radio" value="oui" name="choix_en_famille" id="male" ><span id="male">&nbsp; oui</span>&nbsp; &nbsp;
  <input type="radio" value="non" name="choix_en_famille"  id="male" ><span id="male">&nbsp; non</span>&nbsp; &nbsp;<br><br>
  <label> Equipements:</label><br>
  &nbsp;&nbsp;<input type="radio" value="Avec" name="equipement" id="male" ><span id="male">&nbsp; Avec equipements</span>&nbsp; &nbsp;
  <input type="radio" value="Sans" name="equipement" id="male" ><span id="male">&nbsp; Sans equipements</span>&nbsp; &nbsp;<br><br>
  <label> Besoin d'un assistant de voyage?</label><br>
  &nbsp;&nbsp;<input type="radio" value="oui" name="assistant" id="male" ><span id="male">&nbsp; oui</span>&nbsp; &nbsp;
  <input type="radio" value="non" name="assistant" id="male" ><span id="male">&nbsp; non</span>&nbsp; &nbsp;<br><br>
  <label>choisissez votre destination</label><br>
  <select id="ville" name="destination" >
   <option value="default">Veuillez choisir votre destination</option>
   <option value="Plage">Plage</option>
   <option value="Montagne">Montagne</option>
   <option value="Cascade">Cascade </option>
   <option value="Vallée">Vallée</option>
   <option value="Sahara">Sahara </option>
 </select><br>
 <span id="errdestination"></span>
 <br><br>
 <label> Date debut </label><br>
 <select id="ville" name="date_debut" >
  <option value="default">Veuillez préciser une date</option>
  <option value="1/1/2021">1/1/2021 </option>
  <option value="15/3/2021">15/3/2021</option>
  <option value="6/6/2021">6/6/2021</option>
  <option value="6/8/2021">6/8/2021 </option>
</select><br>
<span id="errDateDebut"></span><br><br>
<label> date Fin </label><br>
<input type="text" name="date_fin" id="name" placeholder="jj/mm/aaaa" ><br>
<span id="errDateFin"></span>
<br><br><br><br><br><br>
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<input type="submit" name="submit1" value="Reserver" id="sub" ><BR><br><br>



</form>
<?php  else:?>

  <form id="register" action="" method="POST" onclick="ValidationForm2()">

    <label> Prenom :</label><br>
    <input type="text" name="Fname" id="name" placeholder="entrez  votre prenom" class="Fname"><br>
    <span id="errprenom"></span>
    <br><br>
    <label> Nom :</label><br>
    <input type="text" name="Lname" id="name" placeholder="entrez votre nom" class="Lname"><br>
    <span id="errnom"></span>
    <br><br>
    <label> Email :</label><br>
    <input type="email" name="email" id="name" placeholder="entrez votre email"><br>
    <br><br>
    <label> Numero de telephone :</label><br>
    <input type="text" name="Mnum"  id="num" placeholder="Ex: +212 123456789" style="width:300px" class="Mnum"><br>
    <span id="errnuméroT"></span>
    <br><br>
    <label> Ville :</label><br>
    <select id="ville" name="ville" class="ville">
      <option value="default">Choisir votre ville</option>
      <option value="marrakech">marrakech</option>
      <option value="rabat">rabat</option>
      <option value="oujda">oujda </option>
      <option value="agadir">agadir</option>
      <option value="safi">safi</option>
      <option value="casablanca">casablanca</option>
      <option value="azilal">azilal</option>
      <option value="salé">salé</option>
      <option value="tanger">tanger</option>
      <option value="meknès">meknès</option>
      <option value="kénitra">kénitra</option>
      <option value="tétouan">tétouan</option>
      <option value="mohammédia">mohammédia</option>
      <option value="khoribga">khoribga</option>
      <option value="el jadida">el jadida</option>
      <option value="béni mallal">béni mallal</option>
      <option value="taza">taza</option>
      <option value="khémisset">khémisset</option>
      <option value="taourirt">taourirt</option>
      <option value="dakhla">dakhla</option>
    </select><br>
    <span id="errville2"></span><br><br>

    <label> Nombre de personne:</label><br>
    &nbsp;&nbsp;<input type="radio" value="1" name="nombre_Personne" id="nombre" ><span id="male">&nbsp; une seule personne</span><br>
    &nbsp;&nbsp;<input type="radio" value="2" name="nombre_Personne" id="nombre" ><span id="male">&nbsp; deux personnes</span><br>
    &nbsp;&nbsp;<input type="radio"  value="plusieurs" name="nombre_Personne" id="nombre" class="plusieurs"><span id="male">&nbsp; plus que deux personnes</span><br><br>
    <input type="text" name="nombreP" id="name" placeholder="veuillez preciser le nombre" class="nombreP"><br>
    <span id="errnombre2"></span>
    <br><br>
    <label> Trip en famille </label><br>
    &nbsp;&nbsp;<input type="radio" value="oui" name="choix_en_famille" id="male" ><span id="male">&nbsp; oui</span>&nbsp; &nbsp;
    <input type="radio" value="non" name="choix_en_famille"  id="male" ><span id="male">&nbsp; non</span>&nbsp; &nbsp;<br><br>
    <label> Equipements:</label><br>
    &nbsp;&nbsp;<input type="radio" value="Avec" name="equipement" id="male" ><span id="male">&nbsp; Avec equipements</span>&nbsp; &nbsp;
    <input type="radio" value="Sans" name="equipement" id="male" ><span id="male">&nbsp; Sans equipements</span>&nbsp; &nbsp;<br><br>
    <label> Besoin d'un assistant de voyage?</label><br>
    &nbsp;&nbsp;<input type="radio" value="oui" name="assistant" id="male" ><span id="male">&nbsp; oui</span>&nbsp; &nbsp;
    <input type="radio" value="non" name="assistant" id="male" ><span id="male">&nbsp; non</span>&nbsp; &nbsp;<br><br>
    <label>choisissez votre destination</label><br>
    <select id="ville" name="destination" class="destination">
     <option value="default">Veuillez choisir votre destination</option>
     <option value="Plage">Plage</option>
     <option value="Montagne">Montagne</option>
     <option value="Cascade">Cascade </option>
     <option value="Vallée">Vallée</option>
     <option value="Sahara">Sahara </option>
   </select><br>
   <span id="errdestination2"></span>
   <br><br>
   <label> Date debut </label><br>
   <select id="ville" name="date_debut" class="date_debut">
    <option value="default">Veuillez préciser une date</option>
    <option value="1/1/2021">1/1/2021 </option>
    <option value="15/3/2021">15/3/2021</option>
    <option value="6/6/2021">6/6/2021</option>
    <option value="6/8/2021">6/8/2021 </option>
  </select><br>
  <span id="errDateDebut2"></span><br><br>
  <label> date Fin </label><br>
  <input type="text" name="date_fin" id="name" placeholder="jj/mm/aaaa" class="date_fin"><br>
  <span id="errDateFin2"></span>
  <br><br><br><br><br><br>
  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<input type="submit" name="submit1" value="Reserver" id="sub" ><BR><br><br>


</form>
<?php endif;?>

</div>
<?php


if(isset($_POST['contact']))
{

  if(!empty($_POST['emailC'])  AND !empty($_POST['messageC']))
  {


    $header="MIME-Version: 1.0\r\n";
    $header.='Content-Type:text/html; charset="UTF-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $message='
    <html>
    <style type="text/css">
    td{padding-bottom: 10%;}
    .all{background-color: #303036;
      color:#d3d3d3;
      font-family: Verdana,Geneva,sans-serif;

    }
    </style>

    <body>

    <div align="center">
    <div border="0" style="margin:0;padding:0" >

    <table border="0" cellpadding="0" cellspacing="0" width="600" style="border:1px ;background-color:#303036;width:100%">
    <tr>
    <td style="margin:0;padding:10px 40px;background:#303036;">
    <center><strong style="color:#d3d3d3;text-transform:uppercase;font-family: cursive;letter-spacing: 9px;">
    <span style="color:#05f7ff">TRIP2</span>MOROCCO</strong></center>
    </td>
    </tr>
    </table>
    </div>

    <div class="all">
    <br><br><br>
    <br>
    <table>

    <tr>
    <td><strong style="color:#05f7ff;text-decoration:none;letter-spacing:3px">From:</strong></td>
    <td><strong><span style="font-size:13px;color:#d3d3d3">'.$_POST['emailC'].'</span></strong></td>
    </tr>
    </table>
    <br>
    <strong style="color:#05f7ff;text-decoration:none;letter-spacing:3px;max-width:50%;">Message:</strong><br><br>
    <div style="max-width: 50%;font-size:13px;">'.$_POST['messageC'].'</div>
    <br><br><br>
    </div></div>


    </body>
    </html>
    ';



    mail('trip2morocco@gmail.com','CONTACT - TRIP2MOROCCO', $message, $header);
    $_SESSION['msg_contact']['success']="Votre message a été Envoyer";
  }
  else
  {
    $_SESSION['msg_contact']['danger']="Vous n'avez pas rempli le formulaire de contact correctement";

  }

}

?>
<section class="footer">
  <div class="footer-content">
    <div class="footer-section about">
      <h1 class="h2"><span>TRIP2</span>MOROCCO</h1>
      <br>
      <p>Il est facile de personnaliser votre expérience de Road Trip grâce au service fourni
      par TRIP2MOROCCO.Notre équipe vous offre une aventure en pleine sécurité et à petit prix</p>
      <br>
      <div class="contact">
        <span><a class="fa fa-phone"></a> &nbsp;+212-07-07-53-79-30</span>
        <span><a  class="fa fa-envelope"></a> &nbsp; trip2morocco@gmail.com</span>
      </div>
      <div class="socials">
        <span><a href="#" class="fa fa-facebook"></a></span>
        <span><a href="#" class="fa fa-instagram"></a></span>
        <span><a href="#" class="fa fa-youtube"></a></span>
        <span><a href="#" class="fa fa-linkedin"></a></span>
      </div>
    </div>
    <div class="footer-section links">
      <h2 class="h2">Quick links</h2>
      <br>
      <ul>
        <a href="#"> <li>facebook</li> </a>
        <a href="#"> <li>instagram</li> </a>
        <a href="#"> <li>address</li> </a>
      </ul>
    </div>
    <div class="footer-section contact-form">
      <h2 class="h2">contact us</h2>

      <!--Message flash pour l'email de contact-->

      <?php if (isset($_SESSION['msg_contact'])): ?>
        <?php foreach ($_SESSION['msg_contact'] as $type => $message): ?>

          <div class="alert alert-<?=$type;?>" style="width:82%;height:13%;margin:0px; ">
            <strong><li><?=$message; ?></li></strong>
          </div>

        <?php endforeach; ?>
        <?php unset($_SESSION['msg_contact']); ?>
      <?php endif;?>


      <br>
      <form class="" action="" method="POST">
        <input type="email" name="emailC" class="text-input contact-input" placeholder="your email addriss.."><br>
        <textarea name="messageC" class="text-input contact-input" placeholder="your message.."></textarea><br>
        <button type="submit" class="btn btn-big" name="contact">
          <a  class="fa fa-envelope"></a>
          send
        </button>
      </form>
    </div>
  </div>
  <div class="footer-bottom">
    &copy;Trip2Morocco.com |Designed by mechkouri said / merk ikram / joudar samia
  </div>
</section>
<style type="text/css">

  /*message flash*/
  .alert
  {

    /*padding: 0.75rem 1.25rem;*/
    padding: 3rem 2rem;
    margin-bottom: 2rem;
    border-radius: 20px;
    font-family: cursive;
    font-size: 15px;
    width: 75%;
    margin-left: 6%;
    text-decoration: none;


  }


  .alert-danger
  {
    color: #ff0505;
    font-weight: bold;
    list-style-type: none;
    border: solid #fff;



  }
  .alert-success
  {
    background-color: #009933;

  }
</style>
<script type="text/javascript">

    //Les regex:

    var Fr = /^[A-Za-z]+$/;
    var Numéro_valide = /^[+][2][1][2][\s][0-9]{9}$/;
    var Date_fin_valid = /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}$/;
    var Nombre_Personnes_valide = /^[0-9]{2}$/;

    //elements HTML
    var Prenom = document.getElementsByClassName('Fname')[0];
    var Nom = document.getElementsByClassName('Lname')[0];
    var Numéro_télé = document.getElementsByClassName('Mnum')[0];

    var Ville = document.querySelector("select[name='ville']");
    var Ville2 = document.querySelector("select.ville");


    var NombreDePersonnes = document.querySelector("input.nombreP1");
    var NombreDePersonnes2 = document.querySelector("input.nombreP");


    var Destination = document.querySelector("select[name='destination']");
    var Destination2 = document.querySelector("select.destination");

    var Date_debut = document.querySelector("select[name='date_debut']");
    var Date_debut2 = document.querySelector("select.date_debut");

    var Date_fin = document.querySelector("input[name='date_fin']");
    var Date_fin2 = document.querySelector("input.date_fin");

    var If_plusieurs= document.querySelector("input[value='plusieurs']");
    var If_plusieurs2= document.querySelector("input.plusieurs");




    //les shamps d'erreurs:

    var errville = document.getElementById('errville');
    var errnombre = document.getElementById('errnombre');
    var errdestination = document.getElementById('errdestination');
    var errDateDebut = document.getElementById('errDateDebut');
    var errDateFin = document.getElementById('errDateFin');


    //les shamps d'erreurs du form 2:
    var errprenom = document.getElementById('errprenom');
    var errnom = document.getElementById('errnom');
    var errnuméroT = document.getElementById('errnuméroT');
    var errville2 = document.getElementById('errville2');
    var errnombre2 = document.getElementById('errnombre2');
    var errdestination2 = document.getElementById('errdestination2');
    var errDateDebut2 = document.getElementById('errDateDebut2');
    var errDateFin2 = document.getElementById('errDateFin2');


    var test = true;
    //validation des formulaire

    function ValidationForm1(){


      if(Ville.value == "default" ){

        errville.innerHTML = 'Veuillez choisir votre ville';
        errville.style.color = 'Red';
        errville.style.fontFamily = 'calibri';
        errville.style.fontWeight = 'bold';
        test = false;
      }else{
        errville.innerHTML = '';
        test = false;
      }


      If_plusieurs.addEventListener('click', validation_numéro1);

      function validation_numéro1(){


        if(Nombre_Personnes_valide.test(NombreDePersonnes.value) == false || NombreDePersonnes.value > 20){

          errnombre.innerHTML = 'Veuillez entrer un nombre valide';
          errnombre.style.color = 'Red';
          errnombre.style.fontFamily = 'calibri';
          errnombre.style.fontWeight = 'bold';
          test = false;
        }else{
          errnombre.innerHTML = '';
          test = false;
        }
        return test;
      }


      if(Destination.value == "default" ){

        errdestination.innerHTML = 'Veuillez choisir votre destination';
        errdestination.style.color = 'Red';
        errdestination.style.fontFamily = 'calibri';
        errdestination.style.fontWeight = 'bold';
        test = false;
      }else{
        errdestination.innerHTML = '';
        test = false;
      }


      if(Date_debut.value == "default" ){

        errDateDebut.innerHTML = 'Veuillez choisir votre Date de debut compatible';
        errDateDebut.style.color = 'Red';
        errDateDebut.style.fontFamily = 'calibri';
        errDateDebut.style.fontWeight = 'bold';
        test = false;
      }else{
        errDateDebut.innerHTML = '';
        test = false;
      }


      if(Date_fin_valid.test(Date_fin.value) == false ){

        errDateFin.innerHTML = 'Veuillez entrer une date valide';
        errDateFin.style.color = 'Red';
        errDateFin.style.fontFamily = 'calibri';
        errDateFin.style.fontWeight = 'bold';
        test = false;
      }else{
        errDateFin.innerHTML = '';
        test = false;
      }

      return test;
    }


    function ValidationForm2(){


      if(Fr.test(Prenom.value) == false ){
        errprenom.innerHTML = 'Veuillez entrer un prenom valide';
        errprenom.style.color = 'Red';
        errprenom.style.fontFamily = 'calibri';
        errprenom.style.fontWeight = 'bold';

        test = false;
      }else{
        errprenom.innerHTML = '';
        test = false;
      }

      if(Fr.test(Nom.value) == false ){

        errnom.innerHTML = 'Veuillez entrer un nom valide';
        errnom.style.color = 'Red';
        errnom.style.fontFamily = 'calibri';
        errnom.style.fontWeight = 'bold';
        test = false;
      }else{
        errnom.innerHTML = '';
        test = false;
      }

      if(Numéro_valide.test(Numéro_télé.value) == false ){

        errnuméroT.innerHTML = 'Veuillez entrer un numéro de téléphone  valide';
        errnuméroT.style.color = 'Red';
        errnuméroT.style.fontFamily = 'calibri';
        errnuméroT.style.fontWeight = 'bold';
        test = false;
      }else{
        errnuméroT.innerHTML = '';
        test = false;
      }


      if(Ville2.value == "default" ){

        errville2.innerHTML = 'Veuillez choisir votre ville';
        errville2.style.color = 'Red';
        errville2.style.fontFamily = 'calibri';
        errville2.style.fontWeight = 'bold';
        test = false;
      }else{
        errville2.innerHTML = '';
        test = false;
      }

      If_plusieurs.addEventListener('click', validation_numéro2);

      function validation_numéro2(){


        if(Nombre_Personnes_valide.test(NombreDePersonnes2.value) == false || NombreDePersonnes2.value > 20){

          errnombre2.innerHTML = 'Veuillez entrer un nombre valide';
          errnombre2.style.color = 'Red';
          errnombre2.style.fontFamily = 'calibri';
          errnombre2.style.fontWeight = 'bold';
          test = false;
        }else{

          errnombre2.innerHTML = '';
          test = false;
          
        }
        
      }

      
      


      if(Destination2.value == "default" ){

        errdestination2.innerHTML = 'Veuillez choisir votre destination';
        errdestination2.style.color = 'Red';
        errdestination2.style.fontFamily = 'calibri';
        errdestination2.style.fontWeight = 'bold';
        test = false;
      }else{
        errdestination2.innerHTML = '';
        test = false;
      }


      if(Date_debut2.value == "default" ){

        errDateDebut2.innerHTML = 'Veuillez choisir votre Date de debut compatible';
        errDateDebut2.style.color = 'Red';
        errDateDebut2.style.fontFamily = 'calibri';
        errDateDebut2.style.fontWeight = 'bold';
        test = false;
      }else{
        errDateDebut2.innerHTML = '';
        test = false;
      }


      if(Date_fin_valid.test(Date_fin2.value) == false ){

        errDateFin2.innerHTML = 'Veuillez entrer une date valide';
        errDateFin2.style.color = 'Red';
        errDateFin2.style.fontFamily = 'calibri';
        errDateFin2.style.fontWeight = 'bold';
        test = false;
      }else{
        errDateFin2.innerHTML = '';
        test = false;
      }

      return test;
    }

  </script>

</body>
</html>

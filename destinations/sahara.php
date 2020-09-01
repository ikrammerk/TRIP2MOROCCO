<?php require_once'../DB/data.php';
session_start();
if (isset($_SESSION['id'])) {
 $req = $pdo->prepare('SELECT * FROM client WHERE id = ? ' );
 $req->execute([$_SESSION['id']]);
 $recherche = $req->fetch();
}


?>
<!DOCTYPE html>
<html>
<head>
 <title>sahara</title>
 <meta charset="utf-8">
 <link rel="stylesheet"type="text/css" href="stiled.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <style type="text/css">

  /*Apparence du message flash*/
  .alert
  {

    padding: 0.75rem 1.25rem;
    /* margin-bottom: 1rem;*/
    border-radius: 3px;
    font-family: cursive;
    color: white;
    font-size: 15px;
    width: 97.2%;


  }


  .alert-danger
  {
    background-color: #ff0000;


  }
  .alert-success
  {
    background-color: #009933;

  }
</style>
</head>


<body style="background-image:url(dangers-to-avoid-during-night-camping.jpg)">
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
     <li class="active"><a href="#"><i class="fa fa-map-marker"></i> DESTINATION</a>
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
     <?php  if (isset($_SESSION['id']) ) :?>

      <li ><a href="http://localhost/TRIP2MOROCCO/DB/deconnexion.php"><i class="fa fa-sign-in"></i>DECONNEXION</a></li>


      <?php  else: ?>

        <li><a href="http://localhost/TRIP2MOROCCO/SUBSCRIBE/connexion.php"><i class="fa fa-sign-in"></i>CONNEXION</a></li>

      <?php endif;?>
    </ul>
  </div>
  <br><br><br><br>
  <div class="">


    <h1 class="h112" style="text-align:center">Bienvenue au Sahara maghrebine</h1>


    <div class="main12">

      <div style="background-color: aliceblue"class="card12">

        <div class="image12">
         <img class="photox" src="sahara/merzo.jpg">
       </div>
       <div class="dddd">


       <div class="title12">
         <h2>Merzouga</h2>
       </div>
       <div class="des12">
         <p>un petit village saharien situé dans le sud-est du Maroc, à 35 kilomètres de Moulay Ali Cherif, à 50 kilomètres de Erfoud.<br><br><br></p>
         <button>Savoir plus...</button>
       </div>
     </div>
     </div>
     <div style="background-color: aliceblue"class="card12">

      <div class="image12">
       <img class="photox" src="sahara/agafay.jpg">
     </div>
     <div class="dddd">
     <div class="title12">
       <h2>Agafay</h2>
     </div>
     <div class="des12">
       <p>e situe à une trentaine de kilomètres au sud de Marrakech et s’étend sur plusieurs centaines d’hectares. Ce désert, pourtant rocailleux peut être assimilé à un désert de sable.</p>
       <button>Savoir plus...</button>
     </div>
   </div>
   </div>
   <div style="background-color: aliceblue"class="card12">

    <div class="image12">
     <img class="photox" src="sahara/desertdream.jpg">
   </div>
   <div class="dddd">
   <div class="title12">
     <h2>OUARZAZATE Desert Dream</h2>
   </div>
   <div class="des12">
     <p>ville au sud des montagnes du Haut Atlas marocain, connue comme une passerelle vers le désert du Sahara.<br><br></p>
     <button>Savoir plus...</button>
   </div>
 </div>
 </div>
 <div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="sahara/smara.jpg">
 </div>
 <div class="dddd">
 <div class="title12">
   <h2>SMARA</h2>
 </div>
 <div class="des12">
   <p>une ville du Sahara occidental sous contrôle marocain. <br><br><br>.</p>
   <button>Savoir plus...</button>
 </div>
</div>
</div>
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
      <h2 class="logo-text1 h2"><span class="logo-text1">TRIP2</span>MOROCCO</h2> <br>
      <p>Il est facile de personnaliser votre expérience de Road Trip grâce au service fourni
      par TRIP2MOROCCO.Notre équipe vous offre une aventure en pleine sécurité et à petit prix</p><br>
      <div class="contact">
        <span><a class="fa fa-phone"></a> &nbsp;+212-07-07-53-79-30</span>
        <span><a  class="fa fa-envelope"></a> &nbsp; TRIP2MOROCCO@gmail.com</span>

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

          <div class="alert alert-<?=$type;?>" style="width:76%;"><li><?=$message; ?> </li></div>

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
</body>
</html>

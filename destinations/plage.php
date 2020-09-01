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
 <title>plage</title>
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


    <h1 class="h112" style="text-align:center">les Plages du Maroc</h1>


    <div class="main12">

      <div style="background-color: aliceblue"class="card12">

        <div class="image12">
         <img class="photox" src="plage/imsouan.jpg">
       </div>
       <div class="title12">
         <h2>
         Imsouan Plage</h2>
       </div>
       <div class="des12">
         <p>Situé à 82 kilomètres au nord d’Agadir, ce petit village de pêcheur,figure parmi les 27 plus belles plages au monde.<br>.<br><br></p>
         <button>Savoir plus...</button>
       </div>
     </div>

     <div style="background-color: aliceblue"class="card12">

      <div class="image12">
       <img class="photox" src="plage/Lovetrotters-maroc-tanger-plages-08298.jpg">
     </div>
     <div class="title12">
       <h2>
       Plage Belyounch, Tangier</h2>
     </div>
     <div class="des12">
      <p>Longtemps méconnu par les Marocains, Belyounech est un petit village de pêcheurs situé à 16km au nord de Fnideq et à 7km à l’ouest de Ceuta<br><br></p>
      <button>Savoir plus...</button>
    </div>
  </div>

  <div style="background-color: aliceblue"class="card12">

    <div class="image12">
     <img class="photox" src="plage/leguezira.jpg">
   </div>
   <div class="title12">
     <h2>
     Legzira Plage</h2>
   </div>
   <div class="des12">
     <p>la plage rouge, réputée pour ses falaises vertigineuses à la couleur ocre se jetant dans l’océan, et ses 4 splendides arches creusées dans la roche par les marées..<br><br></p>
     <button>Savoir plus...</button>
   </div>
 </div>

 <div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/hosaima.PNG">
 </div>
 <div class="title12">
   <h2>
   Quemado Plage, Hoceima</h2>
 </div>
 <div class="des12">
   <p>Cette plage, située au pied de la falaise Quémado, dont la superficie est de 9000 m2, est incontestablement la meilleure plage de la baie et la plus fréquentée par les estivants.</p>
   <button>Savoir plus...</button>
 </div>
</div>


<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/moulay%20bouselham.PNG">
 </div>
 <div class="title12">
   <h2>
   Moulay Bouselham plage</h2>
 </div>
 <div class="des12">
   <p>une station balnéaire au Maroc,situé dans la région de Rabat-Salé-Kénitra à mi-chemin entre Rabat et Tanger(100 km de chaque ville)«Hawaï»et«3e piscine.<br><br><br></p>
   <button>Savoir plus...</button>
 </div>
</div>
<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/les-voyageuses-plus-belles-plages-nord-du-maroc-el-jebha.jpg">
 </div>
 <div class="title12">
   <h2>
   Plage Eljebha, Tangier</h2>
 </div>
 <div class="des12">
  <p>Les plages d'El Jebha sont en effet parmi les plus belles et les plus propres de la région. A l'est du centre-ville, au pied des montagnes du Rif occidental<br><br>.</p>
  <button>Savoir plus...</button>
</div>
</div>


<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/ouad%20laou.PNG">
 </div>
 <div class="title12">
   <h2>
   Oued Laou plage</h2>
 </div>
 <div class="des12">
   <p> Avec son sable fin, et son eau limpide, cette plage entourée de montagnes est une destination exceptionnelle où il fait bon de profiter de la mer.<br><br>.</p>
   <button>Savoir plus...</button>
 </div>
</div>

<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/las%20cuevas.PNG">
 </div>
 <div class="title12">
   <h2>
   las cuevas Assilah</h2>
 </div>
 <div class="des12">
   <p> La plage de « Las cuevas » ou plage surnommée la « plage du Paradis », se situe à quatre kilomètres de la ville d’Asilah, sur la côte Atlantique. Vous pourrez y accéder en voiture ou à pied depuis Asilah.</p>
   <button>Savoir plus...</button>
 </div>
</div>
<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/sidi%20hssain.PNG">
 </div>
 <div class="title12">
   <h2>
   Sidi Hssain, Nador</h2>
 </div>
 <div class="des12">
   <p> Cette plage nichée entre deux falaises à une cinquantaine de kilomètres au Sud-Ouest de Nador est demeurée presque cachée à l’abri des estivants <br><br>.</p>
   <button>Savoir plus...</button>
 </div>
</div>

<div style="background-color: aliceblue"class="card12">

  <div  class="image12">
   <img class="photox" src="plage/ileee.PNG">
 </div>
 <div class="title12">
   <h2>
   Ile du Dragon dakhla</h2>
 </div>
 <div class="des12">
   <p>Dans le grand sud du Maroc, au désert du sahara avec la cote Atlantique La lagune de dakhla est un terrain de jeu de plusieurs dizaines de kilomètres, ou l'on croise souvent des kitesurfers mais aussi des dauphins, des flamands roses<button>Savoir plus...</button>

   </div>
 </div>
 <div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/portorico.PNG">
 </div>
 <div class="title12">
   <h2>
   PLAGE PORTO RICO À DAKHLA </h2>
 </div>
 <div class="des12">
  <p>Portorico est une superbe plage à 30 minutes de l’hôtel Dakhla Atittude. Elle a été fermée pendant des années mais elle est désormais ouverte au public et c’est un lieu incroyable.</p>
  <button>Savoir plus...</button>
</div>
</div>

<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/blanche.jpg">
 </div>
 <div class="title12">
   <h2>
   Plage Blanche Guelmim</h2>
 </div>
 <div class="des12">
  <p>Située à 200 km au sud d’Agadir et à quasiment mi-chemin entre Tiznit et Tan-Tan,Guelmim est le chef-lieu et la capitale de la région Guelmim<br><br>.</p>
  <button>Savoir plus...</button>
</div>
</div>
<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/Lovetrotters_oriental_cap_trois_fourches-02581-1.jpg">
 </div>
 <div class="title12">
   <h2>
   CAP DES TROIS FOURCHES À NADOR</h2>
 </div>
 <div class="des12">
  <p> Le Cap des Trois Fourches est un promontoire à proximité de la frontière algérienne et de la ville Melilla.<br><br>.</p>
  <button>Savoir plus...</button>
</div>
</div>

<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/dalia.jpg">
 </div>
 <div class="title12">
   <h2>
   Plage Dalia, Tangier</h2>
 </div>
 <div class="des12">
  <p> A la fois sauvage et entretenue, grande et confidentielle, Dalia est une des plus belles plages de la côte méditerranéenne marocaine.<br><br>.</p>
  <button>Savoir plus...</button>
</div>
</div>
<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/les-voyageuses-plus-belles-plages-nord-du-maroc-cala-blanca-nador.jpeg">
 </div>
 <div class="title12">
   <h2>
   Plage Cala Blanca, Nador</h2>
 </div>
 <div class="des12">
  <p> C’est une plage qui se situe au niveau du Sud Est du cap des trois fourches.
  C’est l’un des plus beaux sites pour la plongée sous-marine au Maroc.Bien equipé groupe ou solo and let's go pour la découvrir ensemble!</p>
  <button>Savoir plus...</button>
</div>
</div>
<div style="background-color: aliceblue"class="card12">

  <div class="image12">
   <img class="photox" src="plage/mdiq.jpg">
 </div>
 <div class="title12">
   <h2>
   Plage Mdiq</h2>
 </div>
 <div class="des12">
  <p> La mer y est calme et la température de l'eau incite au bain tout au long de l'année.<br><br><br>.</p>
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

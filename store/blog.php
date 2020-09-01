<?php require_once'../DB/data.php'; 

session_start();
if (isset($_SESSION['id'])) {
 $req = $pdo->prepare('SELECT * FROM client WHERE id = ? ' );
 $req->execute([$_SESSION['id']]);
 $recherche = $req->fetch(); 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Trip2Morocco | STORE </title>
  <link rel="stylesheet" href="style.css">
  <style type="text/css">

    /*message flash*/
    .alert
    {

      padding: 0.75rem 1.25rem;
      margin-bottom: 1rem;
      border-radius: 3px;
      font-family: cursive;
      color: white;
      font-size: 20px;
      width: 97.2%;
      

    }


    .alert-danger
    {
      background-color: #ff0000;

      
    }
    .alert-success
    {
      background-color: #009933;
      
    </style>

  </head>
  <body>


   <!--les messages flash-->

   <?php if (isset($_SESSION['flash'])): ?>
     <?php foreach ($_SESSION['flash'] as $type => $message): ?>

       <div class="alert alert-<?=$type; ?>"><li><?=$message; ?> </li></div>

     <?php endforeach; ?>
     <?php unset($_SESSION['flash']); ?>
   <?php endif;?>


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
          <li><a href="http://localhost/TRIP2MOROCCO/destinations/plage.php">Plage</a></li>
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
  <section>
    <div class="container">
      <br><br><br><br>
      <header>
        <h1>Nouveau arrivage</h1>
        <p><strong>Bienvenue dans notre magazin ici vous trouvez la nouvelle collection de 2020.</strong></p>
      </header>

      <main>
        <div class="singleBlog">
          <img src="tente.png" alt="">
          <div class="blogContent">
            <p> Tente conseillée avec matelas</p><a class="btn" href="https://py.pl/19880K51iYf">Acheter</a>

            <a href="#" class="btn">1500dh</a>
          </div>
        </div>

        <div class="singleBlog">
          <img src="tente-nallo-3-hilleberg.jpg" alt="">
          <div class="blogContent">
            <p> Tente conseillée avec matelas</p><a class="btn" href="https://py.pl/19880K51iYf">Acheter</a>

            <a href="#" class="btn">1000dh</a>
          </div>
        </div>

        <div class="singleBlog">
          <img src="28.png" alt="">
          <div class="blogContent">
            <p>Tente de trekking à arceaux familliale.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
            <a href="#" class="btn">1600dh</a>

          </div>
        </div>
        <div class="singleBlog">
          <img src="TENT.png" alt="">
          <div class="blogContent">
            <p>Tente de camping autoportante 1 personne.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
            <a href="#" class="btn">350dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="5.png" alt="">
          <div class="blogContent">
            <p>Tente de trekking 2secondes.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
            <a href="#" class="btn">400</a>
          </div>
        </div>

        <div class="singleBlog">
          <img src="4.png" alt="">
          <div class="blogContent">
            <p>Tente de trekking 2020 avec matelas.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
            <a href="#" class="btn">450dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="arceaux.jpg" alt="">
          <div class="blogContent">
           <p>Tente de camping à arceaux familliale.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
           <a href="#" class="btn">750dh</a>
         </div>
       </div>

       <div class="singleBlog">
        <img src="1.png" alt="">
        <div class="blogContent">
          <p>Tente de trekking à arceaux familliale 2020.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
          <a href="#" class="btn">1500dh</a>
        </div>
      </div>

      <div class="singleBlog">
        <img src="27.png" alt="">
        <div class="blogContent">
          <p>sac de couchage rouge 1 personne.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
          <a href="#" class="btn">200dh</a>
        </div>
      </div>
      <div class="singleBlog">
        <img src="25.png" alt="">
        <div class="blogContent">
          <p>sac de couchage bleu 1 personne.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
          <a href="#" class="btn">200dh</a>
        </div>
      </div>
      <div class="singleBlog">
        <img src="sac%20couchage%20femme.jpg" alt="">
        <div class="blogContent">
          <p>sac de couchage femme 1 personne 3saison.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
          <a href="#" class="btn">200dh</a>
        </div>
      </div>
      <div class="singleBlog">
        <img src="sac%20orange.jpg" alt="">
        <div class="blogContent">
          <p>sac de couchage orange 3 saison 1 personne.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
          <a href="#" class="btn">200dh</a>
        </div>
      </div>
      <div class="singleBlog">
        <img src="38.png" alt="">
        <div class="blogContent">
          <p>Pince multifonctionel 17 haute qualité.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
          <a href="#" class="btn">150dh</a>
        </div>
      </div>
      <div class="singleBlog">
        <img src="pince%20multitool%20outils%20de%20camping.png" alt="">
        <div class="blogContent">
          <p>Pince multifonctionel 17 haute qualité.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
          <a href="#" class="btn">150dh</a>
        </div>
      </div>

      <div class="singleBlog">
        <img src="32.png" alt="">
        <div class="blogContent">
          <p>Couteau,cuillere,fourchette camping.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
          <a href="#" class="btn">70dh </a>
        </div>
      </div>


      <div class="singleBlog">
        <img src="37.png" alt="">
        <div class="blogContent">
         <p>sac de douche solaire camping.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
         <a href="#" class="btn">250dh </a>
       </div>
     </div>

     <div class="singleBlog">
      <img src="35.png" alt="">
      <div class="blogContent">
        <p>réchaud de camping GPL gaz de comping randonnée.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">150dh </a>

      </div>
    </div>


    <div class="singleBlog">
      <img src="33.png" alt="">
      <div class="blogContent">
        <p>réchaud de camping GPL gaz de comping randonnée.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">150dh </a>
      </div>
    </div>

    <div class="singleBlog">
      <img src="34.png" alt="">
      <div class="blogContent">
        <p>réchaud de camping GPL gaz de comping randonnée.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">150dh </a>

      </div>
    </div>

    <div class="singleBlog">
      <img src="6.png" alt="">
      <div class="blogContent">
        <p>réchaud de camping GPL gaz de comping randonnée.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">150dh </a>

      </div>
    </div>
    <div class="singleBlog">
      <img src="40.png" alt="">
      <div class="blogContent">
        <p>Pantalon de Randonnée Stretch Léger à Séchage Rapide.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">150dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="41.png" alt="">
      <div class="blogContent">
        <p>Chaussure multisport imperméable camping.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">150dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="43.png" alt="">
      <div class="blogContent">
        <p>Sac à dos camping imperméable treking randonnée.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">250dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="44.png" alt="">
      <div class="blogContent">
        <p>Sac à dos camping imperméable treking randonnée.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">250dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="20.png" alt="">
      <div class="blogContent">
        <p>Mochoose Femme Outdoor Mountain Imperméable Coupe-Vent.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">200dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="21.png" alt="">
      <div class="blogContent">
        <p>Mochoose Femme Outdoor Mountain Imperméable Coupe-Vent.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">200dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="22.png" alt="">
      <div class="blogContent">
        <p>Mochoose militaire Homme Outdoor Mountain Imperméable Coupe-Vent.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">200dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="23.png" alt="">
      <div class="blogContent">
        <p>Mochoose Homme Outdoor Mountain Imperméable Coupe-Vent.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">200dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="24.png" alt="">
      <div class="blogContent">
        <p>Sac de trousse de premiers soins d'urgence 2019 étanche en PVC pour le Camping.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">200dh </a>
      </div>
    </div>

    <div class="singleBlog">
      <img src="30.png" alt="">
      <div class="blogContent">
        <p>Sacoche de Tente Rangement Sac d'Auvent Transportation Camping.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">120dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="31.png" alt="">
      <div class="blogContent">
        <p>1500LM Lampe de Poche Torche Camping Voyage.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">80dh </a>
      </div>
    </div>
    <div class="singleBlog">
      <img src="19.png" alt="">
      <div class="blogContent">
        <p>Carbon Baton De Marche multicouleur.| <a href="https://www.decathlon.m/">DECATHLON</a></p>
        <a href="#" class="btn">150dh </a>
      </div>
    </div>

  </main>
</div>
</section>

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
      <h1 class="logo-text h2"><span>TRIP2</span>MOROCCO</h1>
      <br>
      <p class="h2">Il est facile de personnaliser votre expérience de Road Trip grâce au service fourni
      par TRIP2MOROCCO.Notre équipe vous offre une aventure en pleine sécurité et à petit prix </p><br>
      <div class="contact h2">

        <span><a class="fa fa-phone"></a> &nbsp;+212-07-07-53-79-30</span>
        <span><a  class="fa fa-envelope"></a> &nbsp; TRIP2MOROCCO@gmail.com</span>

      </div>
      <div class="socials h2">
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

          <div class="alert alert-<?=$type;?>" style="width:75%;height:13%;font-size:15px;margin:0px;margin-left:8%;  "><li><?=$message; ?> </li></div>

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

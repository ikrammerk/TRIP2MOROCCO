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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Trip2Morocco | STORE </title>
  <link rel="stylesheet" href="styleloc.css">
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
<body >

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


     
     <?php  if (isset($_SESSION['id']) ) :?>

      <li ><a href="http://localhost/TRIP2MOROCCO/DB/deconnexion.php"><i class="fa fa-sign-in"></i>DECONNEXION</a></li>
      
      
      <?php  else: ?>

        <li><a href="http://localhost/TRIP2MOROCCO/SUBSCRIBE/connexion.php"><i class="fa fa-sign-in"></i>CONNEXION</a></li>  

      <?php endif;?> 
    </ul>
  </div>
  <br><br><br><br>
  <section>


    <div class="container">
      <header>
        <h1>Magazin de Location</h1>
        <p><strong>Louer un pack complet contenant les equipements essentiels pour votre camping.</strong></p>
      </header>

      <main>
        <div class="singleBlog">
          <img src="8%20essentiels%20equipement.jpg" alt="">
          <div class="blogContent">
            <p>Un pack de 8 pieces essentielles pour votre camping</p> <a class="btn" href="https://py.pl/9kwPwDt2Xl5">louer</a>
            <a href="#" class="btn">700Dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="5%20piece.PNG" alt="">
          <div class="blogContent">
            <p>Un pack de 5 pieces pour 2 ou 3 personnes</p> <a class="btn" href="https://py.pl/9kwPwDt2Xl5">louer</a>
            <a href="#" class="btn">600Dh</a>
          </div>
        </div>

        <div class="singleBlog">
          <img src="6%20piece%201%20ersonne.PNG" alt="">
          <div class="blogContent">
            <p>le pack idéal de 6 pieces pour 1 ou 2 personnes.|<a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">600Dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="c606c72f-65db-49f7-9504-b6571b161160_1.261f4877222e4e0b7100fa230f17b7da.jpeg" alt="">
          <div class="blogContent">
            <p>le nouveau pack familial de 12 pieces 3 saison.| <a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">700Dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="stratcer%20pack%202.PNG" alt="">
          <div class="blogContent">
            <p>le bon pack pour 3 personnes audacieuses.| <a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">700Dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="strater%20pack.jpg" alt="">
          <div class="blogContent">
            <p>Un pack idéal pour 2 personnes aventureuses.| <a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">600Dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="camping-equipment.jpg" alt="">
          <div class="blogContent">
            <p>Pack idéal pour une personne 3 saison.| <a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">400Dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="1%20persone.jpg" alt="">
          <div class="blogContent">
            <p>Pack idéal pour une personne 3 saison.| <a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">300Dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="glaciere%20electrique%20portable%20camping%20mini%20refrrigirateur.PNG" alt="">
          <div class="blogContent">
            <p>Glacière éléctrique portable,mini refrigerateur camping .| <a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">100Dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="tente%20de%20toit.PNG" alt="">
          <div class="blogContent">
            <p>Tente de toit de voiture 3 saison .| <a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">150Dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="Tente+de+trekking+TREK900+ultralight+1+personne+grise.jpg" alt="">
          <div class="blogContent">
            <p>tente de trekking de voiture ultalight grise.| <a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">150dh</a>
          </div>
        </div>
        <div class="singleBlog">
          <img src="4%20personnes.jpg" alt="">
          <div class="blogContent">
            <p>tente pour 4 personnes 3 saison.| <a href="https://www.decathlon.ma/">DECATHLON</a></p>
            <a href="#" class="btn">150dh</a>
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

            <div class="alert alert-<?=$type;?>" style="width:75%;margin:0px;margin-left:8%;"><li><?=$message; ?> </li></div>

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

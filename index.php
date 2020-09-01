<?php
//faire aappel ao fichier de connexion avec la BD
require_once'DB/data.php'; 
/*le session une fonction predefinie dans le language qui fait appel a un objet $_session qui va contenir les informations sur le  clinet et aussi les msg flash ce qui va nous servir de transporter les info d'une page a l'autre 
*/
session_start();
//condition d'apparence du nom et de la photo anonyme du client apres la connexion
//$_session['id'] contient le id du client connecter 
if (isset($_SESSION['id'])) {
	$req = $pdo->prepare('SELECT * FROM client WHERE id = ? ' );
	$req->execute([$_SESSION['id']]);
	$recherche = $req->fetch(); 
}



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet"type="text/css" href="css/file1.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>index</title>
	<style media="screen">

		[type=radio] {
			display: none;
		}
		* {
			margin: 0;
			padding: 0;
		}
		#slider {
			height: 28vw;
			position: relative;
			perspective: 1500px;
			transform-style: preserve-3d;
		}

		#slider label {
			margin: auto;
			width: 589px;
			height: 284px;
			border-radius: 4px;
			position: absolute;
			left: 0; right: 0;
			cursor: pointer;
			transition: transform 0.4s ease;
		}

		#s1:checked ~ #slide4, #s2:checked ~ #slide5,
		#s3:checked ~ #slide1, #s4:checked ~ #slide2,
		#s5:checked ~ #slide3 {
			box-shadow: 0 1px 4px 0 rgba(0,0,0,.37);
			transform: translate3d(-30%,0,-200px);
		}


		#s1:checked ~ #slide5, #s2:checked ~ #slide1,
		#s3:checked ~ #slide2, #s4:checked ~ #slide3,
		#s5:checked ~ #slide4 {
			box-shadow: 0 6px 10px 0 rgba(0,0,0,.3), 0 2px 2px 0 rgba(0,0,0,.2);
			transform: translate3d(-15%,0,-100px);
		}

		#s1:checked ~ #slide1, #s2:checked ~ #slide2,
		#s3:checked ~ #slide3, #s4:checked ~ #slide4,
		#s5:checked ~ #slide5 {
			box-shadow: 0 13px 25px 0 rgba(0,0,0,.3), 0 11px 7px 0 rgba(0,0,0,.19);
			transform: translate3d(0,0,0);
		}

		#s1:checked ~ #slide2, #s2:checked ~ #slide3,
		#s3:checked ~ #slide4, #s4:checked ~ #slide5,
		#s5:checked ~ #slide1 {
			box-shadow: 0 6px 10px 0 rgba(0,0,0,.3), 0 2px 2px 0 rgba(0,0,0,.2);
			transform: translate3d(15%,0,-100px);
		}

		#s1:checked ~ #slide3, #s2:checked ~ #slide4,
		#s3:checked ~ #slide5, #s4:checked ~ #slide1,
		#s5:checked ~ #slide2 {
			box-shadow: 0 1px 4px 0 rgba(0,0,0,.37);
			transform: translate3d(30%,0,-200px);
		}
		#slide1 { background-image: url(photos/tof4.jpg);}
		#slide2 { background-image:url(photos/tof1.jpg);}
		#slide3 { background-image: url(photos/tof2.jpg);}
		#slide4 { background-image: url(photos/tof3.jpg);}
		#slide5 { background-image: url(photos/tof5.jpg);}


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
<body style="width:100%; height:100%;">

	<!--les mesdsages flash-->

	<?php if (isset($_SESSION['flash'])): ?>
		<?php foreach ($_SESSION['flash'] as $type => $message): ?>
			
			<div class="alert alert-<?=$type; ?>"><li><?=$message; ?> </li></div>

		<?php endforeach; ?>
		<?php unset($_SESSION['flash']); ?>
	<?php endif;?>

	<header id="abc">
		<div class="main">
			<div class="logo">
				<img src="photos/2.png">
			</div>

			<!-- Nom et pronon de client connecter au site-->

			<?php  if (isset($_SESSION['id']) ) :?> 
				<ul>
					<li><img style="width: 40px;
					height: 40px;
					border-radius: 50%;
					margin-top: 22px;"
					src="photos/guest.png"></li>
				</ul> 
				<ul>
					<li><p style="color: white;font-size: 18px; margin-top: 28px;margin-right:15px; font-family: SourceSansPro;"><?php echo $recherche->prenom.' '.$recherche->nom;   ?></p></li>
				</ul>
			<?php endif;?> 

			<ul style="padding: 30px">
				<li class="active"><a href="index.php"><i class="fa fa-home"></i>ACCEUIL</a></li>
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
					<div class="title">
						<H1><span class="trip2">TRIP2</span>MOROCCO <i class="fa fa-angellist"></i></H1>
					</div>

					<div class="button">
						<a href="#" class="btn"> <i class="fa fa-video-camera"></i> Video descriptive</a>
						<a href="#" class="btn"> <i class="fa fa-leanpub"></i> Savoir plus</a>
					</div>
				</header>
				<br><br>

				<header id="def">
					<section class="newone">
						<center>  <table id="table1">
							<tr >
								<td class="td1"><center><img src="photos/security.png" alt="" width="70px"></center></td>
								<td class="td1"><center><img src="photos/guitar%20(1).png" alt="" width="80px" ></center></td>
								<td class="td1"><center><img src="photos/icon-counter2.png" alt="" width="70px"></center></td>
							</tr>
							<tr>
								<td class="td2"><center><b>La Securité</b></center></td>
								<td class="td2"><center><b>Le Confort</b></center></td>
								<td class="td2"><center><b>La jeunesse</b></center></td>
							</tr>
							<tr>
								<td class="td3"><center>Vivez L'aventure en Toute securité<br> grâce au service de Trip2Morocco.</center></td>
								<td class="td3"><center>Decouvrez Les meilleurs espaces d'aventures au Maroc <br> et choisissez votre séjour parmi plus de 20 campings.</center></td>
								<td class="td3"><center>Grâce à notre équipe de jeunes <br> qui assure la qualité de votre voyage au moindre coût. </center></td>
							</tr>
						</table></center>
					</section>
					<br><br>
					<section id="slider">
						<input type="radio" name="slider" id="s1">
						<input type="radio" name="slider" id="s2">
						<input type="radio" name="slider" id="s3" checked>
						<input type="radio" name="slider" id="s4">
						<input type="radio" name="slider" id="s5">
						<label for="s1" id="slide1"></label>
						<label for="s2" id="slide2"></label>
						<label for="s3" id="slide3"></label>
						<label for="s4" id="slide4"></label>
						<label for="s5" id="slide5"></label>
					</section>


					<section class="container row">
						<span class="profil1"><h2>ASSISTANT DE VOYAGE</h2></span>
						<p class="textx">Notre service coopére avec des assistants de voyage bien experimentés et ayant des connaissances de la region choisie qui vous offrent toutes les aides possibles au niveau du trajet , camping et sécurité</p>
						<div class="col-md-3">
							<div class="our-team">
								<div class="pic">
									<img src="photos/team-5.jpg">
								</div>
								<div class="team-content">
									<span class="post">youssef<br>assistant de voyage <br>plage et cascade</span>
								</div>
								<ul class="social">
									<li><a href="#" class="fa fa-facebook"></a></li>
									<li><a href="#" class="fa fa-twitter"></a></li>
									<li><a href="#" class="fa fa-google-plus"></a></li>
									<li><a href="#" class="fa fa-linkedin"></a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="our-team">
								<div class="pic">
									<img src="photos/team-4.jpg">
								</div>
								<div class="team-content">
									<span class="post">mohamed<br>assistant de voyage<br>montagne et sahara </span>
								</div>
								<ul class="social">
									<li><a href="#" class="fa fa-facebook"></a></li>
									<li><a href="#" class="fa fa-twitter"></a></li>
									<li><a href="#" class="fa fa-google-plus"></a></li>
									<li><a href="#" class="fa fa-linkedin"></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="our-team">
								<div class="pic">
									<img src="photos/team-3.jpg">
								</div>
								<div class="team-content">
									<span class="post">SAID<br>assistant de voyage<br>montagne et cascade</span>
								</div>
								<ul class="social">
									<li><a href="#" class="fa fa-facebook"></a></li>
									<li><a href="#" class="fa fa-twitter"></a></li>
									<li><a href="#" class="fa fa-google-plus"></a></li>
									<li><a href="#" class="fa fa-linkedin"></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="our-team">
								<div class="pic">
									<img src="photos/team-2.jpg">
								</div>
								<div class="team-content">
									<span class="post">kamal <br> assistant de voyage<br>Montagne et cascade</span>
								</div>
								<ul class="social">
									<li><a href="#" class="fa fa-facebook"></a></li>
									<li><a href="#" class="fa fa-twitter"></a></li>
									<li><a href="#" class="fa fa-google-plus"></a></li>
									<li><a href="#" class="fa fa-linkedin"></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="our-team">
								<div class="pic">
									<img src="photos/team-1.jpg">
								</div>
								<div class="team-content">
									<span class="post">amina <br> assistante de voyage</span>
									<span class="post">Plage et vallée</span>
								</div>
								<ul class="social">
									<li><a href="#" class="fa fa-facebook"></a></li>
									<li><a href="#" class="fa fa-twitter"></a></li>
									<li><a href="#" class="fa fa-google-plus"></a></li>
									<li><a href="#" class="fa fa-linkedin"></a></li>
								</ul>
							</div>
						</div>
					</section>
				</header>

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
							<h1 class="logo-text"><span>TRIP2</span>MOROCCO</h1>
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
							<h2>Quick links</h2>
							<br>
							<ul>
								<a href="#"> <li>facebook</li> </a>
								<a href="#"> <li>instagram</li> </a>
								<a href="#"> <li>address</li> </a>
							</ul>
						</div>
						<div class="footer-section contact-form">
							<h2>contact us</h2>
							<div class="msgflash">

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

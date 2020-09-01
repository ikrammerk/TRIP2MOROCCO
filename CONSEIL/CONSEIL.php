<?php require_once'../DB/data.php';
session_start();
if (isset($_SESSION['id'])) {
	$req = $pdo->prepare('SELECT * FROM client WHERE id = ? ' );
	$req->execute([$_SESSION['id']]);
	$recherche = $req->fetch();
}


?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style1.css">
	<script src="js/modernizr.js"></script>
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
<body>
	<div id="menu">
		<div class="main1">
			<div class="logo11">
				<img src="2.png">
			</div>
			<ul class="ul" style="padding: 30px">

				<?php  if (isset($_SESSION['id']) ) :?>

					<ul class="ul">
						<li class="li"><img style="width: 40px;
						height: 40px;
						border-radius: 50%;
						margin-top: 22px;"
						src="../photos/guest.png"></li>
					</ul>
					<ul class="ul">
						<li class="li"><p style="color: white;font-size: 18px;margin-top: 28px;margin-right:15px;font-family: SourceSansPro;"><?php echo $recherche->prenom.' '.$recherche->nom;   ?></p></li>
					</ul>
				<?php endif;?>

				<li  class="li" ><a href="../index.php"><i class="fa fa-home"></i>ACCEUIL</a></li>
				<li class="li" ><a href="#"><i class="fa fa-map-marker"></i> DESTINATION</a>
					<div class="submemu11">
						<ul class="ul">
          <li><a href="http://localhost/TRIP2MOROCCO/destinations/plage.php">Plage</a> </li>
							<li><a href="http://localhost/TRIP2MOROCCO/destinations/montagne.php">Montagne</a> </li>
							<li><a href="http://localhost/TRIP2MOROCCO/destinations/cascade.php">Cascade</a> </li>
							<li><a href="http://localhost/TRIP2MOROCCO/destinations/valley.php">Vallée</a> </li>
							<li><a href="http://localhost/TRIP2MOROCCO/destinations/sahara.php">Sahara</a> </li>
						</ul>
					</div>
				</li>
				<li class="li" class="active1" ><a href="#"><i class="fa fa-cart-arrow-down"></i> MAGAZIN</a>
					<div class="submemu11">
						<ul class="ul">
							<li class="li" class="hover-me"><a href="#">Equipement</a>
								<div class="submenu21">
									<ul class="ul">
										<br>
										<li class="li"> <a href="http://localhost/TRIP2MOROCCO/store/blog.php">Achat</a></li>
											<li class="li" > <a href="http://localhost/TRIP2MOROCCO/location/location.php">location</a> </li>
										</ul>
									</div>
								</li>
								<li class="li" ><a href="http://localhost/TRIP2MOROCCO/book/boooks.php">Livres</a> </li>
							</ul>
						</div>
					</li>
					<li class="li" ><a href="http://localhost/TRIP2MOROCCO/reservation/form.php"><i class="fa fa-book"></i>RESERVATION</a></li>
					<li class="li"   ><a href="#" style="background-color: #fff;
				  color:#000;"><i class="fa fa-heart" ></i>CONSEILS</a>

					</li>

					<?php  if (isset($_SESSION['id']) ) :?>
						<ul class="ul">
							<li class="li" ><a href="http://localhost/TRIP2MOROCCO/DB/deconnexion.php"><i class="fa fa-sign-in"></i>DECONNEXION</a></li>
						</ul>
						<?php  else: ?>
							<ul class="ul">
								<li class="li" ><a href="http://localhost/TRIP2MOROCCO/SUBSCRIBE/connexion.php"><i class="fa fa-sign-in"></i>CONNEXION</a></li>
							</ul>
						<?php endif;?>
					</ul>

					</div>


				</div>
				<br><br><br><br><br><br><br> <br><br>

				<div id="cont">


					<title>Conseils pour un parfait road trip</title>
					<main>
						<div class="cd-image-block">
							<ul class="cd-images-list">
								<li class="is-selected">
									<a href="#0">
										<h2>conseils pour un parfait road trip</h2>
									</a>
								</li>

								<li>
									<a href="#0">
										<h2>conseils pour un parfait road trip</h2>
									</a>
								</li>

								<li>
									<a href="#0">
										<h2>conseils pour un parfait road trip</h2>
									</a>
								</li>

								<li>
									<a href="#0">
										<h2>conseils pour un parfait road trip</h2>
									</a>
								</li>
							</ul>
						</div>

						<div class="cd-content-block">
							<ul>
								<li class="is-selected">
									<div>
										<h2>1. L’intérêt de Google Maps</h2>

										<p>
											Un bon début. Entrez vos lieux de départ et de destination, cela vous donnera une idée du temps qu’il faudra pour faire la route. Ajustez-la, essayez différentes options, ajoutez ou supprimez des lieux en fonction du temps imparti et de vos désirs, bien sûr. Tracez l’itinéraire principal, sans qu’il soit pour autant figé. Laissez-vous la possibilité de le modifier, selon vos envies et ce que vous allez découvrir en chemin.
										</p>
										<h2>Bien charger son sac à dos</h2>
										<p>
											Si vous tentez l’expérience camping en mode sac à dos, il va falloir faire des choix, car vous ne pourrez pas tout emporter. La règle en matière de sac à dos : le poids après chargement ne doit jamais dépasser le quart de votre propre poids. Une fois votre sélection faite, remplissez votre sac de manière à bien répartir le poids afin d’éviter qu’il ne vous tire vers l’arrière. Ainsi, placez d’abord les éléments les plus légers, comme le sac de couchage au fond de votre sac. Ensuite, mettez les choses les plus lourdes (eau, nourriture, etc.) au milieu, dans la région du dos. Cela permettra de mieux vous stabiliser tout en gardant votre équilibre et votre liberté de mouvement. Enfin, sur le dessus et le devant du sac, insérez les articles de poids moyen ou volumineux.

										</p>
										<h2>3. De la (bonne) musique</h2>
										<p>
											Qui dit road-trip, dit musique, assurément! Et vous aurez tout le temps d’en écouter, alors pensez à télécharger des playlists sur votre smartphone avant de partir (et n’oubliez pas votre câble USB). Vous pourrez également mettre la radio, une façon de découvrir les goûts locaux et des titres que vous ne pourrez peut-être plus écouter par la suite.
										</p>
									</div>
								</li>

								<li>
									<div>
										<h2>5. Sortez des sentiers battus</h2>

										<p>
											Emprunter l’autoroute est plus rapide, mais on passe à côté de nombreux points d’intérêt. Si possible et si vous avez le temps, prenez les routes moins fréquentées. Vous verrez bien plus de choses, vous rencontrerez des locaux, et vous pourrez vous aventurer en des lieux jamais vus auparavant. Pareil, n’hésitez pas à faire des détours! Vous avez vu ce signe indiquant une ville fantôme ou un site touristique étonnant? Suivez-le! C’est la spontanéité qui doit guider votre road-trip.
										</p>
										<h2> Emportez une glacière</h2>
										<p>
											Qui sait quand vous trouverez un endroit où manger? Emportez une glacière, il en existe même que vous pouvez brancher dans la voiture. Mettez-y boissons et snacks pour ces moments où vous aurez envie de grignoter (ou ceux où vous serez perdu…).
										</p>
										<h2> Partir seul ou à plusieurs?</h2>
										<p>
											Les road-trips peuvent renforcer ou détruire une amitié. Il y a plein de côtés sympas à voyager à plusieurs, mais pensez tout de même que vous allez rester enfermés tous ensemble dans une voiture pendant plusieurs heures d’affilées, le pire étant quand le GPS ne fonctionne plus et que personne n’est capable de lire une carte. Avez-vous les mêmes intérêts? Si vous voulez voir des sites historiques et eux, des bars uniquement, cela pourrait s’avérer difficile à gérer.

											Partez avec une personne qui vous ressemble, qui pourra vous épauler ou vous compléter (en sachant lire une carte ou en parlant une autre langue par exemple), et quelqu’un qui pourra vous soutenir à tout moment durant le voyage.
										</p>
									</div>
								</li>

								<li>
									<div>
										<h2>Bien s'équiper</h2>

										<p>
											Bien s’équiper

											La clef pour bien réussir son camping passe surtout par un équipement adéquat. Alors, quoi apporter? Les incontournables : une tente, un sac de couchage, un tapis de sol, une bâche, une lampe torche ou lampe frontale, un couteau, une trousse de premiers soins. Vous pouvez également penser à d’autres accessoires aussi utiles, mais cela dépendra de votre mode de camping, de l’ultraléger à l’ultraéquipé. N’oubliez pas que tout ce que vous prendrez devra être porté, transporté et rapporté. C’est particulièrement vrai pour les accessoires de cuisine, qui peuvent être encombrants (réchaud à gaz, poêles, casseroles, glacières, vaisselle, etc.), mais essentiels pour cuisiner. Dormir sous la tente, c’est faire des compromis : manger froid ou chaud, privilégier un accessoire au détriment d’un autre. Pour s’équiper, il n’est pas nécessaire de tout acheter : faites le tour de la famille et de vos amis pour pouvoir emprunter quelques items parfois dispendieux. Vous pouvez aussi acheter d’occasion, mais assurez-vous que tout fonctionne correctement.
										</p>

										<h2>Tester son matériel</h2>
										<p>
										Si vous avez déjà campé auparavant, rien ne garantit que votre équipement est encore opérationnel. Pour éviter toute déconvenue au moment fatidique de fixer la tente sans piquets, de gonfler votre matelas troué ou de tenter d’allumer un réchaud vide, il est essentiel de vérifier l’état de son matériel avant de partir.</p>

										<h2>Regarder les prévisions météo</h2>
										<p>
										En général, un réflexe qu’a tout bon vacancier avant de partir en voyage. Mais encore plus important quand il s’agit d’aller bivouaquer en nature. Ainsi, vous serez à même de préparer vos sacs de voyage en fonction des conditions climatiques prévues durant votre séjour. Il serait dommage de devoir s’acheter un imperméable ou un veston en catastrophe. Faites un tour sur Environnement Canada, Météo Média ou Weather Channel pour avoir des informations précises : radars et satellites, détection de la foudre, météo spécialisée (aviation, maritime). </p>

									</div>
								</li>

								<li>
									<div>
										<h2>Où installer sa tente?</h2>

										<p>
											Une fois arrivé sur votre aire de camping, choisissez un endroit plat, sans racines et cailloux pour éviter les maux de dos et les déchirures de votre matériel, tente et matelas. Un terrain en hauteur et bien drainé pour éviter l’accumulation d’eau s’il pleut. De même, s’installer près d’un cours d’eau peut s’avérer dangereux en cas de crues subites. Lors de l’installation de votre tente, tendez suffisamment les cordes des points d’ancrage de la tente. Mal fait, le double toit entrerait en contact avec la tente et pourrait imbiber l’abri en cas d’intempéries. Enfin, étendre une bâche sous la tente est un bon moyen de la garder plus efficacement au sec. Mais faites attention à ce que cette bâche ne dépasse pas la base de la tente pour éviter que l’eau ne s’y accumule! Optez pour un endroit ombragé, pour ne pas que le chaud soleil de l’après-midi fasse de votre tente un vrai sauna. Toutefois, il faut éviter de s’installer directement sous un arbre, ce qui peut constituer un risque en cas d’orages, de foudre ou de vents forts.
										</p>

										<h2>Garder sa tente propre et confortable</h2>
										<p>
										Votre séjour sera d’autant plus agréable si votre tente reste un lieu de vie agréable, confortable pour dormir et se reposer : laissez vos souliers à l’extérieur, mais protégez-les de la pluie sous le double toit; gardez la « porte » fermée au maximum pour empêcher les insectes ou les animaux de s’introduire dans votre tente; rangez vos affaires personnelles au milieu de la tente, et non sur les côtés, afin qu’elles ne soient pas humidifiées par la pluie ou la rosée matinale; nettoyez de temps en temps votre sol de tente pour enlever les saletés accumulées.</p>

										<h2>Comment allumer un feu de camp?</h2>
										<p>
										Avant tout, assurez-vous que vous êtes autorisé à le faire ou même à ramasser du bois dans les environs. Première étape donc, nettoyez l’aire en enlevant les matières combustibles dans un rayon d’un mètre autour du feu. Délimitez la zone de foyer avec des pierres, puis placez-y une matière inflammable : brindilles, papier journal ou éléments végétaux secs (non, l’essence n’est pas recommandée!). Ajoutez autour et par dessus du bois d’allumage, en général des petits bouts de bois très sec, pour faire partir le feu. Enfin, à mesure que le feu prend de l’ampleur, ajoutez progressivement des buches plus grosses. Le feu a besoin d’oxygène, veillez à ce que l’air circule bien entre les rondins. Ne quittez pas votre campement sans éteindre correctement le feu. Arrosez-le pour bien vous en </p>
									</li>

								</ul>

								<button class="cd-close">Close</button>
							</div> <!-- .cd-content-block -->

							<ul class="block-navigation">
								<li><button class="cd-prev inactive">&larr; Prev</button></li>
								<li><button class="cd-next">Next &rarr;</button></li>
							</ul>
						</main>

						<script src="js/jquery-2.1.4.js"></script>
						<script src="js/main.js"></script>
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

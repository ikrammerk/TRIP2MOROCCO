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
  <meta charset="utf-8">
  <link rel="stylesheet"type="text/css" href="menu.css">
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
     
     <?php  if (isset($_SESSION['id']) ) :?>

      <li ><a href="http://localhost/TRIP2MOROCCO/DB/deconnexion.php"><i class="fa fa-sign-in"></i>DECONNEXION</a></li>
      
      
      <?php  else: ?>

        <li><a href="http://localhost/TRIP2MOROCCO/SUBSCRIBE/connexion.php"><i class="fa fa-sign-in"></i>CONNEXION</a></li>  

      <?php endif;?> 
    </ul>
  </div>
  <br><br><br><br>

  <div class="book">
    <h1 align="center";>Guide Books   <img src="travel.png" class="logo"></h1>
  </div>
  <div class="text">
    <p>La lumière est dans le livre.Ouvrez le livre tout grand.Laissez-le rayonner,laissez-le faire.by Victor Hugo 1878... Découvrez une sélection de 10 livres. </p>
  </div>
  <center><table  border = 5 bordercolor ="black" align = center width="1000" height="1000" >
    <tr>
      <th>Livre</th>
      <th>Langue</th>
      <th>Desciption</th>
      <th>Prix</th>
    </tr>

    <tr>
      <th><img src="Morocco_12.9781786570321.pdp.0.jpg" alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>Lonely Planet Morocco is your passport to the most relevant, up-to-date advice on what to see and skip, and what hidden discoveries await you. Explore the medina and tanneries in Fez, hop between kasbahs and oases in the Draa Valley, or catch a wave at Taghazout; all with your trusted travel companion. Get to the heart of Morocco and begin your journey now!</th>
      <th>100DH</th>
    </tr>

    <tr>
      <th><img src="414zaZfjwRL._SX331_BO1,204,203,200_.jpg" alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>This travel journal with 120 pages is the perfect companion for your next travel! You can write down every experiences you make and bring all the adventures you made on your vacation on paper.

        Packing list
        Fill in place, date and more
        Daily rating of your experiences
        Up to 120 days
      Softcover</th>
      <th>120DH</th>
    </tr>

    <tr>
      <th><img src="51+ieZt8OSL._SX322_BO1,204,203,200_.jpg" alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>Written by locals, Fodor’s Essential Morocco is the perfect guidebook for those looking for insider tips to make the most out their visit to Marrakesh, Fez, Casablanca, and beyond. Complete with detailed maps and concise descriptions, this Morocco travel guide will help you plan your trip with ease.</th>
      <th>100DH</th>
    </tr>

    <tr>
      <th><img src="51347ZKAQWL._SX294_BO1,204,203,200_.jpg" alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>This guide covers in great detail the exotic variety of Morocco and contains up-to-date information on museums, galleries, and archaeological sites. There are articles on history, Islam, customs, food, and crafts.
        Series: BLUE GUIDE MOROCCO
        Paperback: 224 pages
      Publisher: W W Norton & Co Inc; 3 edition (July 1, 1998)</th>
      <th>130DH</th>
    </tr>

    <tr>
      <th><img src="51cxbbLRVtL._SX333_BO1,204,203,200_.jpg" alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>Insight Guide Morocco is your comprehensive guide book to one of the world’s most exciting destinations. Full-color photos throughout combine with lively, narrative text to help you discover this intense and rewarding country. Our inspirational Best of Morocco section outlines top attractions and activities not to miss – Marrakech, the capital of the south, the medieval city of Fes, the snow-capped Atlas mountains, the fortified coastal town of Essaouira, the dunes of the Sahara. We share our recommendations for the finest festivals, the prettiest towns, the best adventures – from trekking up Mount Toubkal, the highest mountain in North Africa, to skiing (yes, you can ski in Africa), rafting, kayaking and dune boarding. We advise you where to go for the best souks (markets) and share our tips on how to haggle.</th>
      <th>100DH</th>
    </tr>

    <tr><th><img src="51sbjkKlyCL._SX316_BO1,204,203,200_.jpg" alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>Whether readers are traveling by 4WD or camel, this acclaimed guide covers all aspects Saharan and includes 10,000 miles of itineraries in Morocco, Mauritania, Libya, Mali, Tunisia, Algeria, Niger, Chad, and Egypt.
        Hardcover: 688 pages
        Publisher: Trailblazer Publications; Second edition (Feb. 1 2005)
      </th>
      <th>110DH</th>
    </tr>

    <tr>
      <th><img src="GIVI-Explorer_Morocco-Overland_cover-414x640.jpg" alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>An essential book for many motorcyclists and a true “must-have”, dedicated to a year-round destination that is within reach of European travellers.
        For the traveller who takes pleasure in personally planning their travels, this book is an excellent starting point. Its pages explain in detail (including off-road with GPS directions) a route of over 10,000 km from the High Atlas Mountains to the border with Mauritania.
      </th>
      <th>150DH</th>
    </tr>

    <tr>
      <th><img src="roadtripped-678x1024.jpg"alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>Steven Gerald Gabel—a.k.a. Stiggy—needs to get out of Minnesota. His father recently took his own life, his mother is a shell of the person she used to be, and his sort-of-girlfriend ghosted him and skipped town. What does he have left to stick around for? Armed with his mom’s credit card and a tourist map of Great River Road, Stiggy sets off in his dad’s car.</th>
      <th>50DH</th>
    </tr>

    <tr>
      <th><img src="your-destination-is-on-the-left-9781481492126_hr-678x1024.jpg"alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>Dessa Rhodes is a modern day nomad. Her family travels in an RV, their lives defined by state lines, exit signs, and the small communal caravan they call home. Among them is Cyrus, her best friend and long-time crush, whom she knows she can never be with. When your families are perpetually linked, it’s too dangerous to take a risk on romance.</th>
      <th>70DH</th>
    </tr>

    <tr>
      <th><img src="akhir%20wahd.jpg"alt="" border=0 height=200 width=200></th>
      <th>Anglais</th>
      <th>For anyone who has fallen under its spell, a car represents freedom and adventure. For decades, the American tradition of the road trip has been bound up with the idea of new possibilities and new horizons. This book is an indispensable guide to the most beautiful, breathtaking, extraordinary, and fun road trips the world has to offer.</th>
      <th>70DH</th>
    </tr>
  </table></center>
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

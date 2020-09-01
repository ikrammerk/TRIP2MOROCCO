  <?php    require_once'../DB/data.php';

  session_start();



  if (!empty($_POST)) {

   if (empty($_POST['Fname']) || empty($_POST['Lname'])|| empty($_POST['numT']) ||  empty($_POST['ville']) ||  empty($_POST['Adresse']) || empty($_POST['codePostal']) || empty($_POST['sexe']) ){

    $errors['Fname'] = ' <i class="fa fa-exclamation-triangle"></i> Tout les shamps doivent etre remplis';

  }


  if (empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
   $errors['email']="Votre email est invalide";
 } else{
// verification d'email au niveau de la BD
  $req = $pdo->prepare('SELECT id FROM client WHERE email = ?');

  $req->execute([$_POST['email']]);

  $client = $req->fetch();
}
if ($client){
 $errors['email'] = '<i class="fa fa-exclamation-triangle"></i> Cet email est déja utilisé ';
}

if (empty($_POST['passe']) || $_POST['passe'] != $_POST['passe2']){
 $errors['password']="Vous devez entrer un mot de passe valide ";
}

if (empty($errors)){

  $insertion = $pdo->prepare("INSERT INTO client SET prenom=?,nom=?,numéro_de_télé=?,ville=?,adresse=?,code_postal=?,email=?, mot_de_passe=?,sexe=?,confirmation=?");
  $Firstname = $_POST['Fname'];
  $Lastname = $_POST['Lname'];
  $NumTele = $_POST['numT'];
  $ville = $_POST['ville'];
  $sexe =  $_POST['sexe'];
  $adresse =  $_POST['Adresse'];
  $codePostal = $_POST['codePostal'];
  $password = password_hash($_POST['passe'],PASSWORD_BCRYPT);
  $confirme = "NON";
  $email = $_POST['email'];

  $insertion->bindValue(1, $Firstname);
  $insertion->bindValue(2, $Lastname);
  $insertion->bindValue(3, $NumTele);
  $insertion->bindValue(4, $ville);
  $insertion->bindValue(5, $adresse);
  $insertion->bindValue(6, $codePostal);
  $insertion->bindValue(7, $email);
  $insertion->bindValue(8, $password);
  $insertion->bindValue(9, $sexe);
  $insertion->bindValue(10, $confirme);
  $insertion->execute();
  $client_id = $pdo->lastInsertId();

  $lien =  "http://localhost/TRIP2MOROCCO/DB/confirme.php?id=$client_id&confirme=$confirme";
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
  <p style="margin-left: 15px; margin-top: 12px;">Félicitations! Vous êtes desormais  inscrites. Vous pouvez maintenant béneficier de nos services proposés.Vous receverez également des notifications envoyés à votre adresse e-mail  pour tout trip organisé. Veuillez cliquer sur le lien ci dessous afin de confirmer votre compte.</p>
  <p>Merci A bientôt!</p>
  <p>Equipe<strong> TRIP2MOROCCO</strong></p>
  <div>

  <br>
  <center>
  <a href="'.$lien.'" style="background-color:#05f7ff;border-radius:9px ;color:white;font-family:cursive;font-size:13px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:250px;
  padding: 17px 17px 17px 17px">
  Confirmez votre compte
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

  mail($_POST['email'],'Confirmation de compte',$message,$header);

  $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé sur votre boite email pour valider votre compte';
  header('location: inscription.php');
  exit();

}



}
?>
<!DOCTYPE html>
<html lang="fr" >
<head>

  <meta charset="UTF-8">
  <title>SUBSCRIBE</title>
  <link rel="stylesheet" href="../css/file2.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='../css/formjs.js'></script>
</head>
<body>
  <div class="form">
    <h1>INSCRIPTION</h1>
    <div class="register">
      <a href="connexion.php" id="return"><i class="fa fa-reply-all"></i></a>
      <h2>Inscrivez-vous ici :</h2>

      <!--controle d'erreurs-->


      <?php  if (!empty($errors)):?>
        <div class="alert alert-danger">
          <p><i class="fa fa-times"></i> Vous n'avez pas remplir  le formulaire  correctement !!</p>
          <ul>
            <?php foreach ($errors as $error): ?>

              <li><?= $error; ?></li>
            <?php endforeach; ?>

          </ul>
        </div>
      <?php endif; ?>

      <!--les mesdsages flash-->

      <?php if (isset($_SESSION['flash'])): ?>
       <?php foreach ($_SESSION['flash'] as $type => $message): ?>

         <div class="alert alert-<?=$type; ?>"><li><?=$message; ?> </li></div>

       <?php endforeach; ?>
       <?php unset($_SESSION['flash']); ?>
     <?php endif;?>






     <form id="form" class="form" action="" method="POST" onclick ="Validation()">
      <div class="form-control ">
        <label for="name1"> Prenom :</label><br>
        <input type="text" name="Fname" id="name1" placeholder="entrez  votre prenom" >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small><br>
        <span id="Fname"></span><br><br>
      </div>
      <div class="form-control">
        <label for="nom"> Nom :</label><br>
        <input type="text" name="Lname" id="nom" placeholder="entrez votre nom">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small><br>
        <span id="Lname"></span><br><br>
      </div>
      <div class="form-control">
        <label > Numero de telephone :</label><br>
        <input type="text" name="numT"  id="telephone" placeholder="Ex: +212 123456789">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small><br>
        <span id="numT"></span><br><br>
      </div>
      <div class="form-control">
        <label> Ville :</label><br>
        <select id="ville" name="ville" required>
          <option selected value="default">Veuillez choisir votre Ville</option>
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
        <span id="vle"></span><br><br>
      </div>
      <div class="form-control">
        <label for="Adresse"> Adresse :</label><br>
        <input type="text" name="Adresse" id="Adresse" placeholder="entrez votre secteur ou appartement...">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small><br>
        <span id="addr"></span><br><br>
      </div>
      <div class="form-control">
        <label for="postal"> Code postal :</label><br>
        <input type="text" name="codePostal" id="postal" placeholder="Ex: 40000"> <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small><br>
        <span id="Cpostale"></span><br><br>
      </div>
      <div class="form-control">
        <label for="Email"> Email :</label><br>
        <input type="email" name="email" id="Email" placeholder="entrez votre email">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small><br>
        <br><br>
      </div>
      <div class="form-control">
        <label for="passe"> Mot de passe :</label><br>
        <input type="password" name="passe" id="passe"  placeholder="creez votre mot de passe"> <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small><br>
        <br><br>
      </div>
      <div class="form-control">
        <label for="passe2"> confirmer votre mot de passe:</label><br>
        <input type="password" name="passe2" id="passe2"  placeholder="confirmer votre mot de passe:"> <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small><br>
        <span id="confirme_mdp"></span><br><br>
      </div>
      <label>Le sexe:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="sexe" id="sexe" value="male" ><span id="male">&nbsp; male</span>&nbsp; &nbsp;&nbsp;&nbsp;
      <input type="radio" name="sexe" id="sexe" value="femelle" ><span id="male">&nbsp; femelle</span>&nbsp; &nbsp;
      <br><br><br><br>
      &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<button type="submit" id="submit">S'INSCRIRE</button><BR><br><br>
    </form>

    <style type="text/css">


      /*message flash*/
      .alert
      {

        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
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

      function Validation(){
     //les elements HTML:

     var Prenom = document.getElementById('name1');
     var Nom = document.getElementById('nom');
     var Numéro_télé = document.getElementById('telephone');
     var Ville = document.getElementById('ville');
     var Adresse = document.getElementById('Adresse');
     var CodePostal = document.getElementById('postal');
     var Mdp = document.getElementById('passe');
     var Confirme_Mdp = document.getElementById('passe2');

    //les shamps d'erreurs:
    var errprenom = document.getElementById('Fname');
    var errnom = document.getElementById('Lname');
    var errnuméroT = document.getElementById('numT');
    var errville = document.getElementById('vle');
    var erraddresse = document.getElementById('addr');
    var errpostale = document.getElementById('Cpostale');
    var errconfirme = document.getElementById('confirme_mdp');

    var test = true;


    //Les regex:

    var Fr = /^[A-Za-z]+$/;
    var Numéro_valide = /^[+][2][1][2][\s][0-9]{9}$/;
    var Postale_valide = /^([0-9]{5})+$/;
    var Adrss_fr = /[A-Za-z]/;

    //validation de formulaire


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

    if(Adrss_fr.test(Adresse.value) == false ){

      erraddresse.innerHTML = 'Veuillez entrer une adresse valide';
      erraddresse.style.color = 'Red';
      erraddresse.style.fontFamily = 'calibri';
      erraddresse.style.fontWeight = 'bold';
      test = false;
    }else{
      erraddresse.innerHTML = '';
      test = false;
    }



    if(Postale_valide.test(CodePostal.value) == false ){

      errpostale.innerHTML = 'Veuillez entrer un code postale valide';
      errpostale.style.color = 'Red';
      errpostale.style.fontFamily = 'calibri';
      errpostale.style.fontWeight = 'bold';
      test = false;
    }else{
      errpostale.innerHTML = '';
      test = false;
    }

    if(Confirme_Mdp.value != Mdp.value ){

      errconfirme.innerHTML = 'Veuillez confirmez votre mot de passe';
      errconfirme.style.color = 'Red';
      errconfirme.style.fontFamily = 'calibri';
      errconfirme.style.fontWeight = 'bold';
      test = false;
    }else{
      errconfirme.innerHTML = '';
      test = false;
    }

    return test;

  }


</script>
</body>
</html>

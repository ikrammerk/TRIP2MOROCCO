<?php require_once'../DB/data.php';

session_start();

  if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['passe'])) {

 $req = $pdo->prepare('SELECT * FROM client WHERE email = ? AND confirme_date IS NOT NULL ' );
 $req->execute([$_POST['email']]);
 $client = $req->fetch();

 if( password_verify($_POST['passe'], $client->mot_de_passe)){


  session_start();


  $_SESSION['auth'] = $client;
  $_SESSION['id'] = $client->id;


  $_SESSION['flash']['success'] = ' Vous etes maintenant connecté ';
  header('location: ../store/blog.php');


}

else{

  $_SESSION['flash']['danger'] = '<i class="fa fa-user-times"></i> Email ou mot de passe incorrecte !!!';

}

}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>

  <meta charset="utf-8">
  <title>CONNEXION</title>
<link rel="stylesheet" href="../css/filecon.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='../css/formjs.js'></script>
</head>
<body>
  <div class="form">

    <div class="register">
      <a href="../index.php" id="return"><i class="fa fa-reply-all"></i></a>


     <form id="form" class="form" action="" method="POST">
       <h1>CONNEXION<i class="fa fa-user-circle-o"></i></h1>
       <!--les mesdsages flash-->

       <?php if (isset($_SESSION['flash'])): ?>
        <?php foreach ($_SESSION['flash'] as $type => $message): ?>

          <div class="alert alert-<?=$type; ?>"><li><?=$message; ?> </li></div>

        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
      <?php endif;?>


      <div class="form-control ">
        <label for="name1">Email</label><br>


        <input type="email" name="email" id="Email" placeholder="entrez  votre email" >

         <br><br>
      </div>



      <div class="form-control">
        <label for="passe"> Mot de passe : </label><br>

        <input type="password" name="passe" id="passe"  placeholder="entrez votre mot de passe">


        <br><br>

        <h6 class="h6"><a href="inscription.php">Inscrirez vous maintenant!</a></h6>
        <br><br>
        </div>
        <button>Se connecter</button><br><br>

    </form>

  </div>
</div>

<style type="text/css">
 .form-control a
 {
  text-decoration: 0;
  margin-left: 3%;
  color:white ;
}
.form-control  a
{
  font-size: 14px;
  text-decoration: none;

}
.form-control h6 a:hover
{
  text-decoration: underline;

}


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
  margin-top: -40px;
  text-decoration: none;

}

.alert-danger
{
  color: #ff0505;
font-weight: bold;
list-style-type: none;


}
.alert-success
{
  color: #009933;

}

</style>

</body>
</html>

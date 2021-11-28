<?php
 session_start();

 if (isset($_SESSION['user_id'])) {
   header('Location: login.php');
 }
  require 'db.php';
 
 if (!empty($_POST['username']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');
  $records->bindParam(':username', $_POST['username']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0) {
    $_SESSION['user_id'] = $results['id'];
    header("Location: index.php");
  } else {
    $message = 'Credenciales incorrectas';
  }
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>VA parqueadero</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
  <body>
    <div class="header">
      <nav>
          <div class="nav-links" id="navLinks">  
              <i class="fa fa-close" onclick="hideMenu()"></i>
              <ul>
                  <li><a href="index.php">HOME</a></li>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="login.php">Reservar</a></li>
                  <li><a href="contactenos.php">Contactenos</a></li>
              </ul>
          </div>
          <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
      <div class="container">
       <div class="card">
         <div>
           <div class="card-front">

              <h2>Iniciar sesi&oacute;n</h2>
              <hr>
              <form action="login.php" method="POST">
                
                <input type="text" name="username" class="input-box" placeholder="Ingrese aqui su usuario" required>
                <input type="password" name="password" class="input-box" placeholder="Ingrese aqui su constrase&ntilde;a" required>
                <hr>
                <button type="submit" value= "submit" class="sub-button">Ingresar</button>
                <input type="checkbox"><span> Recordar usuario</span>
              </form>
              <button type="button" class="bttn"><a class=bttn href="register.php">Registrarse</a></button>
              <hr>
           </div>
           <div>
          </div>
         </div>
       </div>
      </div> 
    </div>
    <div class="footer">
      <h4>North Texas Health Care System</h4>
      <p>Changing lives. One Veteran at a time.</p>
      <div class="icons">
        <a href="https://www.facebook.com/VeteransHealth/"><i class="fa fa-facebook"></i></a>
        <a href="https://twitter.com/veteranshealth"><i class="fa fa-twitter"></i></a>
      </div>
    </div> 
  </body> 
</html>

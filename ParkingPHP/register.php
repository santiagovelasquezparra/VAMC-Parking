<?php
 require_once 'db.php';

 $message = '';

 if (!empty($_POST['name']) && !empty($_POST['password'])) {
   $sql = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)";
   $stmt = $conn->prepare($sql);
   
   $stmt -> bindParam(':name',$_POST['name']);
   $stmt -> bindParam(':username',$_POST['username']);
   $stmt -> bindParam(':email',$_POST['email']);

   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
   $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario creado correctamete';
    } else {
      $message = 'No se puedo registrar usuario';
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
                  <li><a href="reservar.php">Reservar</a></li>
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

            <h2>Registro</h2>
            <form function="register.php" method="POST">
              <hr>
              <input type="text" class="input-box" name="name" placeholder="Nombre" required>
              <input type="text" class="input-box" name="username" placeholder="Usuario" required>
              <input type="email" class="input-box" name="email" placeholder="Email" required>
              <input type="password" class="input-box" name="password" placeholder="Constrase&ntilde;a" required>
              <hr>
              <button type="submit" name="newUser" value ="SingUp" class="sub-button">Registrar</button>
            </form>
            <button type="button" class="bttn"> <a class=bttn href="login.php">Ya tengo una cuenta</a></button>
          <hr>
          </div>
         </div>
       </div>
      </div> 
        <script>
          var card = document.getElementById("card");

          function openRegister(){
            card.style.transform = "rotateY(-180deg)";
          }
          function openLogin(){
            card.style.transform = "rotateY(0deg)";
          }
        </script>
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
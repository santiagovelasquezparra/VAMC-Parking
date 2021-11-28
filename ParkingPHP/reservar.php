<?php
  session_start();

  require 'db.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, username, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VA parqueadero</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>


<body>
    <section class="header">
    <?php if(!empty($user)): ?>
        <nav>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-close" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="reservar.php">Reservar</a></li>
                    <li><a href="contactenos.php">Contactenos</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    <?php else: ?>  
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

    <?php endif; ?> 

      <div class="formulario-reservacion">
        <h1>Reservación</h1>
        <h2>Reserva tu parqueadero aqui.</h2>
        <p>Fecha</p>
        <input class="espacios" type="date" name="fecha" id="fecha"><br>
        <p>Hora de llegada</p>
        <input class="espacios" type="time" name="hora" id="hora" >
        <p>Hora de Salida</p>
        <input class="espacios" type="time" name="hora" id="hora" ><br>
        <p>Placa</p>
        <input type="text" name="placa" class="espacios" maxlength="7" placeholder="AB 1234"/><br>
        <p>Tipo de parqueo</p>
        <select  class="espacios" name="Tipo"><option>Al aire libre</option><option>Cubierto</option><option>Valet</option></select><br>
        <input class="boton" type="button" value="Reservar" onclick="msg()">
      </div>
  </section>
  <script>
    function msg() {
      alert("Reservación exitosa.");
    }
    </script>
</body>


<!-------- footer ---------->

<section class="footer">
  <h4>North Texas Health Care System</h4>
  <p>Changing lives. One Veteran at a time.</p>
  <div class="icons">
    <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
    <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
</section>  


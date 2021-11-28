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

<!DOCTYPE html>
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
        <div class="text-box">
            <h1>Parqueadero</h1>
            <p>Siempre mejorando nuestros servicios</p>
            <a href="reservar.php" class="hero-btn">Reserva tu cupo de parqueo</a>
        </div>
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
        <div class="text-box">
            <h1>Parqueadero</h1>
            <p>Siempre mejorando nuestros servicios</p>
            <a href="login.php" class="hero-btn">Reserva tu cupo de parqueo</a>
        </div>
    <?php endif; ?> 
    </section>

    <!-----------tipos de parqueo------------>

    <section class="course">
        <h1>Tipos de parqueo</h1>
        <p>Ofrecemos tres tipos de parqueo</p>
        <div class="row">
            <div class="course-col">
                <h3>Parqueo al aire libre</h3>
                <p>parqueo en los lotes externos 1 o 2</p>
            </div>
            <div class="course-col">
                <h3>Parqueo cubierto</h3>
                <p>Parqueo en cualquiera de los 4 niveles del parqueadero cubierto</p>
            </div>
            <div class="course-col">
                <h3>Valet parking</h3>
                <p>Servicio de parqueo asistido.</p>
            </div>
        </div>
    </section>

    <!-------- footer ---------->

    <section class="footer">
        <h4>North Texas Health Care System</h4>
        <p>Changing lives. One Veteran at a time. </p>
        <div class="icons">
            <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
            <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>

        </div>
        <?php require "contador_visitas.php"?>
    </section>
    </body>
</html>

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

<!------- Contact Us ------->

    
<section class="location">
    <iframe src="https://maps.google.com/maps?q=dallas%20vamc&t=&z=13&ie=UTF8&iwloc=&output=embed" width="720" height="445" frameborder="0" style="border:0" auto></iframe>
</section>

<section class="contact-us">
    <div class="row">
        <div class="contact-col">
            <div>
                <i class="fa fa-home"></i>
                <span>
                    <h5>Dallas VA Medical Center </h5>
                    <p>4500 S Lancaster Rd, Dallas, TX 75216</p>
                </span>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <span>
                    <h3>1-877-327-0022</h3>
                    <p>Lunes - Viernes, 7:00 a.m. - 7:00 p.m. </p>
                </span>
            </div>
            
        </div>
        <div class="contact-col">
            <form method="post" action="contact-form-handler.php">
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Correo electronico" required>
            <input type="text" name="subject" placeholder="Telefono" required>
            <textarea rows="8" name="message" placeholder="Comentarios" required></textarea>
            <button type="submit" class="hero-btn red-btn">ENVIAR</button>
            </form> 
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
</section>   
<?php
    $name = $_POST['nombre'];
    $visitor_email = $_POST['email'];
    $subject = $_POST['asunto'];
    $message = $_POST['mensaje'];


    $email_from = 'info@parkdallasvamc.com';

    $email_subject = "Nueva sumision de formato";
    
    $email_body =   "nombre: $name.\n".
                    "correo electronico: $visitor_email.\n".
                    "Telefono: $subject.\n".
                    "comentarios: $message.\n";


    $to = "lenfent@gmail.com";

    $headers = "From: $email_from \r\n";

    $headers .= "Reply-To: $visitor_email \r\n";

    mail($to,$email_subject,$email_body,$headers);

    header("Location: contact.html");


?>
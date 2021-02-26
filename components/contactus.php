<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../css/contact.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Contact</title>
</head>
<body>
    <div class="contenedor">
        <h1>Formulario de Contacto</h1>
        <div class="contenido">
            <div class="info">
                <div class="col">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>3a Calle Pte, Candelaria de La Frontera</p>
                </div>
                <div class="col">
                    <i class="fas fa-envelope"></i>
                    <p >obeliskgamer@gmail.com</p>
                </div>
                <div class="col">
                    <i class="fas fa-phone"></i>
                    <p>(503) 7698-0896</p>
                </div>
                <div class="redes-s">
                    <a href="https://www.facebook.com/"><i class="icono facebook fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/"><i class="icono instagram fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/"><i class="icono youtube fab fa-youtube"></i></a>
                    <a href="https://www.twitter.com/"><i class="icono twitter fab fa-twitter"></i></a>
                </div>
            </div>
            <form action="" method="GET" class="formulario">
                <input type="text" name="nombre" placeholder="Nombre" id="nombre">
                <input type="text" name="correo" placeholder="E-Mail" id="correo">
                <input type="text" name="asunto" placeholder="Asunto" id="asunto">
                <textarea name="mensaje" id="mensaje" placeholder="Mensaje"></textarea>
                <button type="button">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>
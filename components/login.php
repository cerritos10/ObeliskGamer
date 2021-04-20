<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../css/login.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <link href="../css/tienda.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
  <form action="../php/logueo.php" method="post">
      <div class="popup" >
          <div class="content">

      <h1 class="sign-in">Log In</h1> 
        <div class="input-field"><input   class="validate" placeholder="E-mail" name="email"></div>
        <div class="input-field"><input type="password"  class="validate" placeholder="Password" name="password"></div>
          <button class="second-button">Sign in</button>
          <?php 
            if(isset($_GET['error'])){
              echo '<div class="col-12 alert-danger">'.$_GET['error'].'</div>';
            }
          ?>
          <p>Don't have an account? <a href="../components/registrer.html">Sign Up</a></p>
          <a href="../components/index.php">Back to Home</a></p>
          </div>
          
        </div>
  </form>
</body>
<div class="pie">
</div>

</html>


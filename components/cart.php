<?php 
  session_start();
  include('../php/conexion.php');
  if (isset($_SESSION['carrito'])) {
    if (isset($_GET['id'])) {
      $arreglo = $_SESSION['carrito'];
      $encontro = false;
      $numero = 0;
      for ($i=0; $i < count($arreglo) ; $i++) { 
        if ($arreglo[$i]['Id'] == $_GET['id']) {
          $encontro = true;
          $numero = $i;
        }
      }
      if ($encontro == true) {
        $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad']+1;
        $_SESSION['carrito'] = $arreglo;
      }
      else {
        $nombre = "";      
        $precio = "";      
        $imagen = "";
        $res = $conexion -> query('select * from productos where id_producto =' .$_GET['id']) or die($conexion->error);       
        $fila = mysqli_fetch_row($res);
        $nombre = $fila[1];  
        $precio = $fila[3];     
        $imagen = $fila[4];
        $arregloNuevo = array(
          'Id' => $_GET['id'],
          'Nombre' => $nombre,
          'Precio' => $precio,
          'Imagen' => $imagen,
          'Cantidad' => 1          
        );
        array_push($arreglo, $arregloNuevo);
        $_SESSION['carrito'] = $arreglo;
      }
    }
  }
  else {
    if (isset($_GET['id'])) {
      $nombre = "";      
      $precio = "";      
      $imagen = "";
      $res = $conexion -> query('select * from productos where id_producto =' .$_GET['id']) or die($conexion->error);       
      $fila = mysqli_fetch_row($res);
      $nombre = $fila[1];  
      $precio = $fila[3];     
      $imagen = $fila[4];
      $arreglo[] = array(
        'Id' => $_GET['id'],
        'Nombre' => $nombre,
        'Precio' => $precio,
        'Imagen' => $imagen,
        'Cantidad' => 1          
      );
      $_SESSION['carrito'] = $arreglo;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">


    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
  <?php include("../layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Productos</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Quitar</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  if (isset($_SESSION['carrito'])) {
                    $arregloCarrito = $_SESSION['carrito'];
                    for ($i = 0; $i < count($arregloCarrito); $i++) { 
                ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="../assets/images/<?php echo $arregloCarrito[$i]['Imagen']; ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arregloCarrito[$i]['Nombre']; ?></h2>
                    </td>
                    <td>$<?php echo $arregloCarrito[$i]['Precio']; ?></td>
                    <td>
                      <div class="input-group mb-1 centrado" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center cantidad" value="<?php echo $arregloCarrito[$i]['Cantidad']; ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <td>$<?php echo $arregloCarrito[$i]['Precio']*$arregloCarrito[$i]['Cantidad'];?></td>
                    <td><a href="#" class="btn-gradi">X</a></td>
                  </tr>

                <?php }} ?>

                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block">Actializar Carrito</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block">Continuar compra</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Cupon de descuento</label>
                <p>Ingrese su código de cupón si tiene uno.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Aplicar Cupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Totales del carrito</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$230.00</strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$230.00</strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceder con el pago</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include("../layouts/footer.php"); ?> 
  </div>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>

  <script src="../js/main.js"></script>
    
  </body>
</html>
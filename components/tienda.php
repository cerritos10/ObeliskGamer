<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ObeliskGamer</title>
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

    <link href="../css/tienda.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/style.css">
    
    
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include("../layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Productos</h2></div>
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Ultimos
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">fff</a>
                      <a class="dropdown-item" href="#">fff</a>
                      <a class="dropdown-item" href="#">fff</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">

            <?php
              include('../php/conexion.php');
              $resultado = $conexion -> query("SELECT * FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria
              ORDER BY id_producto DESC LIMIT 9")or die($conexion -> error);
              while($fila = mysqli_fetch_array($resultado)){
            ?>
            
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up" >
                  <div class="block-4 text-center border-product">
                    <figure class="block-4-image">
                      <a href="../components/shop-single.php?id=<?php echo $fila['id_producto'];?>">
                      <img src="../assets/images/<?php echo $fila['imagen'];?>" alt="Image placeholder" class="tamaño-productos"></a>
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="shop-single.php?id=<?php echo $fila['id_producto'];?>"><?php echo $fila['nombre'];?></a></h3>
                      <p class="mb-0"><?php echo $fila['categoria'];?></p>
                      <p class="text-primary font-weight-bold">$<?php echo $fila['precio'];?></p>
                    </div>
                  </div>
               </div>
            <?php } ?>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class=" border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase texto_indicadores d-block">Principales</h3>
              <ul class="texto_filtros list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span>Computadoras</span> </a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Discos Duros</span> </a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Perifericos</span></a></li>
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase texto_indicadores d-block">Filtrar por precio</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0" disabled="" />
              </div>
                <div id="gaming">
                  <p class="texto_filtros">
                    <a  data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Gaming
                    </a>
                  </p>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                      <div class="mb-4" class="texto_filtros">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ra_gaming" id="radiogaming">
                          <label for="radiogamind">
                            Default radio
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ra_gaming" id="radiogaming2">
                          <label class="form-check-label" for="radiogaming2">
                            Default checked radio
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="Oficina">
                  <p class="texto_filtros">
                    <a  data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Oficina
                    </a>
                  </p>
                  <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                      <div class="mb-4" class="texto_filtros">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ra_oficina" id="raiooficina">
                          <label for="raiooficina">
                            Default radio
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ra_oficina" id="raiooficina2" >
                          <label class="form-check-label" for="raiooficina2">
                            Default checked radio
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="Redes">
                  <p class="texto_filtros">
                    <a  data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Redes
                    </a>
                  </p>
                  <div class="collapse" id="collapseExample2">
                    <div class="card card-body">
                      <div class="mb-4" class="texto_filtros">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ra_redes" id="radioredes">
                          <label  for="radioredes">
                            Default radio
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ra_redes" id="radioredes2" >
                          <label class="form-check-label" for="radioredes2">
                            Default checked radio
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                  <div class="col-md-7 site-section-heading pt-4">
                    <h2>Categorias</h2>
                  </div>
                </div>
                <div class="row border-">
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0 " data-aos="fade" data-aos-delay="">
                    <a class="block-2-item" href="#">
                      <figure class="image border-categories">
                        <img src="../assets/images/razer-v-m.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Collecciones</span>
                        <h3>Perifericos</h3>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                    <a class="block-2-item" href="#">
                      <figure class="image border-categories">
                        <img src="../assets/images/carou3.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Collecciones</span>
                        <h3>Monitores</h3>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                    <a class="block-2-item" href="#">
                      <figure class="image border-categories">
                        <img src="../assets/images/carou6.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Collecciones</span>
                        <h3>Luces LED</h3>
                      </div>
                    </a>
                  </div>
                </div>
              
            </div>
          </div>
        </div>

        <div class="comentarios">
                
          <center><h2>Area de Comentarios</h2></center>

          <form name="form1" method="" action="">
            <label for="textarea"></label>
            <center>
              <p>
                <textarea class="" name="comentario" placeholder="Escribe tu comentario" id="textarea"></textarea>
              </p>
              <p>
                <input class="boton-comentar" type="button" value="Comentar">
              </p>
            </center>
          </form>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <script src="../js/main.js"></script>
  </body>
</html>
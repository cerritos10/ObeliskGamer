<?php  
  session_start();
  if (!isset($_SESSION['carrito'])) {
    header("Location: ../components/tienda.php");
  }
  $arreglo = $_SESSION['carrito'];
  if (!isset($_SESSION['datos_login'])) {
    header("Location: ../components/login.php");
  }
  $user = $_SESSION['datos_login'];

  //echo reset($user); obtener el primer elemento de un array.
  $id_usuario = ($user['id_usuario']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Check</title>
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

  <script src="https://www.paypal.com/sdk/js?client-id=AWpgQbdr3H4kPDHZPJUUC0wgyO0VP6duNTsazyQf77iiH9ASrvpdQ_MbptJk9yNbH9nlc4HTciEgDgn1"> </script>
  
  <div class="site-wrap">
    <?php include("../layouts/header.php"); ?> 
    <form action="../components/thankyou.php?metodo=efectivo" method="post">
      <div class="site-section">
        <div class="container">
          <div class="row">
              <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Billing Details</h2>
                <div class="p-3 p-lg-5 border">
                  <!--<div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_fname" name="c_fname">
                    </div>
                    <div class="col-md-6">
                      <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_lname" name="c_lname">
                    </div>
                  </div>-->

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Street address">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_state_country" name="c_city">
                    </div>
                    <div class="col-md-6">
                      <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_postal_zip" name="c_postal">
                    </div>
                  </div>

                  <div class="form-group row mb-5">
                    <!--<div class="col-md-6">
                      <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_email_address" name="c_email">
                    </div>-->
                    <div class="col-md-6">
                      <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                    </div>
                  </div>

                  <!--<div class="form-group">
                    <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
                    <div class="collapse" id="create_an_account">
                      <div class="py-2">
                        <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                        <div class="form-group">
                          <label for="c_account_password" class="text-black">Account Password</label>
                          <input type="password" class="form-control" id="c_account_password" name="c_password" placeholder="">
                        </div>
                      </div>
                    </div>
                  </div>-->

                  <div class="form-group">
                    <label for="c_order_notes" class="text-black">Order Notes</label>
                    <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                  </div>

                </div>
              </div>
              <div class="col-md-6">

                <div class="row mb-5">
                  <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                    <div class="p-3 p-lg-5 border">
                      
                      <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                      <div class="input-group w-75">
                        <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Apply</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                
                <div class="row mb-5">
                  <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Your Order</h2>
                    <div class="p-3 p-lg-5 border">
                      <table class="table site-block-order-table mb-5">
                        <thead>
                          <th>Product</th>
                          <th>Total</th>
                        </thead>
                        <tbody>
                        <?php 
                          $total =0;
                          $subtotal =0;
                          for ($i=0; $i < count($arreglo); $i++) { 
                            $subtotal += ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
                            $total =  ($subtotal * 1.13);                      
                        ?>
                          <tr>
                            <td><?php echo $arreglo[$i]['Nombre']; ?> <strong class="mx-2">x</strong><?php echo $arreglo[$i]['Cantidad'] ?></td>
                            <td>$<?php echo $arreglo[$i]['Precio']; ?></td>
                          </tr>
                        <?php } ?>
                          <tr>
                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                            <td class="text-black"><strong>$<?php echo $subtotal ?></strong></td>
                          </tr>
                          <tr>
                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                            <td class="text-black font-weight-bold"><strong>$<?php echo $total ?></strong></td>
                          </tr>
                        </tbody>
                      </table>

                      <div class="border p-3 mb-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                        <div class="collapse" id="collapsebank">
                          <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          </div>
                        </div>
                      </div>

                      <div class="border p-3 mb-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                        <div class="collapse" id="collapsecheque">
                          <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          </div>
                        </div>
                      </div>

                      <div class="border p-3 mb-5">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                        <div class="collapse" id="collapsepaypal">
                          <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          </div>
                          <div id="paypal-button-container"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Place Order</button>
                      </div>

                    </div>
                  </div>
                </div>

              </div>
          </div>
          <!-- </form> -->
        </div>
      </div>
    </form>                        
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
    
  <script>
  //CODIGO IMPEMTACION DE PAYPAL
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $total ?>'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            //console.log(details);
            if (details.status == 'COMPLETED') {
              location.href="../components/thankyou.php?metodo=paypal"
            }
            //alert('Transaction completed by ' + details.payer.name.given_name);
          });
        }
      }).render('#paypal-button-container'); 
    </script>
  </body>
</html>
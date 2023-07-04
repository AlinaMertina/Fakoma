<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>FAKO'MA-Liste Panier</title>
        <meta name="description" content="">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/bootstrap.min.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/animate.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/owl.carousel.min.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/slick.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/chosen.min.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/font-awesome.min.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/themify-icons.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/ionicons.min.css"?>>
		<link rel="stylesheet" href=<?php echo base_url()."assets/css/jquery-ui.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/meanmenu.min.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/style.css"?>>
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/responsive.css"?>>
        <script src=<?php echo base_url()."assets/js/vendor/modernizr-2.8.3.min.js"?>></script>
    </head>
    
    <?php include('header.php')?>
		<!-- header end -->
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>Liste Panier</h3>
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li class="active">Liste Panier</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
         <!-- shopping-cart-area start -->
        <div class="cart-main-area ptb-100">
            <div class="container">
                <h3 class="page-title">Votre panier</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Images</th>
                                            <th>Nom des Produits</th>
                                            <th>Prix Unitaire</th>
                                            <th>Quantité</th>
                                            <th>Total</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0?>
                                        <?php foreach ($_SESSION['cart'] as $cart ) {?>
                                            <?php if($cart['nombre']>0){?>
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img src="<?php echo base_url().'assets/img/cart/cart-3.jpg'?>" alt=""></a>
                                                </td>
                                                <td class="product-name"><a href="#"><?php echo $cart['nomProduit']?> </a></td>
                                                <td class="product-price-cart"><span class="amount"><?php echo $cart['prix']?></span></td>
                                                <td class="product-quantity">
                                                    <div class="pro-dec-cart">
                                                   <span class="amount"><?php echo $cart['nombre']?></span>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><?php echo $val=$cart['prix']*$cart['nombre']?></td>
                                                <td class="product-remove">
                                                    <a href="deletePanier?indice=<?php echo $cart['idProduit']?>"><i class="fa fa-times"></i></a>
                                            </td>
                                            </tr>
                                            <?php $total= $total+$val?>
                                            <?php }?>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="index">Continuer les achats</a>
                                        </div>
                                        <div class="cart-clear">
                                            <a href="deletePanier">Vider le panier</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                </div>
                            </div>
                           
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>Total des achats <span><?php echo $total?></span></h5>
                                    <div class="total-shipping">
                                        <h5>Mode de paiement</h5>
                                        <ul>
                                            <li><input type="radio" name="vola"> MVola </li>
                                            <li><input type="radio" name="vola"> AirtelMoney</li>
                                            <li><input type="radio" name="vola"> OrangeMoney</li>

                                        </ul>
                                    </div>
                                    <h4 class="grand-totall-title">Grand Total  <span><?php echo $total?></span></h4>
                                    <a href="#">Procéder au paiement</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer style Start -->
        <?php include('footer.php')?>
		<!-- Footer style End -->
        
		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

</html>

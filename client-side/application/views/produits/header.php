<!doctype html>
<html class="no-js" lang="zxx">
    <body>
                <!-- header start -->
                <header class="header-area gray-bg clearfix">
                    <div class="header-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-6">
                                    <div class="logo">
                                        <a href="index.php">
                                           
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8 col-6">
                                    <div class="header-bottom-right">
                                        <div class="main-menu">
                                            <nav>
                                                <ul>
                                                    <li class="top-hover"><a href="<?php echo base_url('index.php/CT_produit/home')?>">Accueil</a>
                                                       
                                                    </li>
                                                    <li><a href="<?php echo base_url('index.php/CT_produit/about')?>">A propos</a></li>
                                                    <li class="mega-menu-position top-hover"><a href="<?php echo base_url('index.php/CT_produit/')?>">Magasin</a>
                                                        
                                                    </li>
                                                    <li class="top-hover"><a href="<?php echo base_url('index.php/CT_produit/blog')?>">blog</a></li>
                                                    
                                                    <li><a href="<?php echo base_url('index.php/CT_produit/contact')?>">Contact</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <div class="header-currency">
                                            <span class="digit">ARIARY</span>
                                            
                                        </div>
                                        <div class="header-cart">
                                            <a href="#">
                                                <div class="cart-icon">
                                                    <i class="ti-shopping-cart"></i>
                                                </div>
                                            </a>
                                            <?php 
                                                $total = 0 ;
                                                $monatnt = 0;
                                            ?>
                                            <div class="shopping-cart-content">
                                                <ul>
                                                    <?php if(isset($_SESSION['cart'])){?>
                                                        <?php foreach ($_SESSION['cart'] as $cart ) {
                                                            if($cart['nombre']>0){
                                                        ?>
                                                        <li class="single-shopping-cart">
                                                            <div class="shopping-cart-img">
                                                                <a href="#"><img alt="" src="<?php echo base_url().'assets/img/cart/cart-1.jpg'?>"></a>
                                                            </div>
                                                            <div class="shopping-cart-title">
                                                                <h4><a href="#"><?php echo $cart['nomProduit']?> </a></h4>
                                                                <h6>Quantité: <?php echo $cart['nombre']?></h6>
                                                                <span><?php echo $cart['prix']?></span>
                                                            </div>
                                                            <?php 
                                                                $i= 1;
                                                                $monatnt = $cart['prix']*$cart['nombre'];
                                                                $total = $total +$monatnt;
                                                            ?>
                                                            <div class="shopping-cart-delete">
                                                                <a href="deletePanier?indice=<?php echo $cart['idProduit']?>"><i class="ion ion-close"></i></a>
                                                            </div>
                                                        </li>
                                                        <?php } }?>
                                                    <?php }?>
                                                   
                                                </ul>
                                                <div class="shopping-cart-total">
                                                    <h4>Total : <span class="shop-total"><?php echo $total?></span></h4>
                                                </div>
                                                <div class="shopping-cart-btn">
                                                    <a href="<?php echo base_url('index.php/CT_produit/cart')?>">Voir le panier</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

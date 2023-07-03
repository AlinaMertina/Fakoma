<?php if(!isset($alert)) $alert=array(); ?>
<?php if(!isset($maxi)) $maxi=array(); ?>
<?php if(!isset($mini)) $mini=array(); ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Alerte et Notification </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Socicete FAKO'MA</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <?php if (!empty($min)) { ?>
                <?php for ($i =0 ; $i<count($alert);$i++) { ?>
                    <div class="col-sm-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>STOCK Produit :</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h2 class="mb-0"></h2><?=  $alert[$i]->nomproduit; ?></h2>
                                            <p class="text-success ml-2 mb-0 font-weight-medium"><?=  $alert[$i]->quantitereste; ?></p>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">STOCK Maximum  => <?= isset($maxi[$i]) ? $maxi[$i] : ''; ?> , Minimum => <?= isset($mini[$i]) ? $mini[$i] : ''; ?></h6>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
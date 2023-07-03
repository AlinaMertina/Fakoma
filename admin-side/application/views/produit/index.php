
    <!-- plugins:css -->
    
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <style>
      #validation{
        float:right;
        background-color: #61FF7E;
      }
      .dropdown {
          position: relative;
          display: inline-block;
      }
  
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: none;
        color: white;
        min-width: 160px;
        /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
        z-index: 1;
        
      }
          
      .dropdown:hover .dropdown-content {
        display: block;
      }
      
      .dropdown-item {
        /* padding: 12px 16px; */
        text-decoration: none;
        display: block;
        margin-right: 20%;
        margin-left: -100%;
        background-color: #141514;
        color: white;
      }
  
      .dropdown-item:hover {
        background-color: #A6EBC9;
      }
      </style>
    <link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">
    <!-- End layout styles -->
   
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper" style="background-color: #F1F4F7;">
            <div class="page-header">
              <h3 class="page-title" style="color: black;">Gestion des produits</h3>
              <nav aria-label="breadcrumb">

              <div class="dropdown">
                <span class="mdi mdi-format-list-bulleted dropdown-item"></span>
                  <div class="dropdown-content">
                    <a class="dropdown-item" href="<?= base_url("index.php/CT_Produit/index") ?>">Production </a>
                    <a class="dropdown-item" href="<?= base_url("index.php/CT_MatierePremiere/index") ?>">Matiere Premiere </a>
                    <a class="dropdown-item" href="<?= base_url("index.php/CT_CompositionProduit/index")?>">Composition</a>
                    <a class="dropdown-item" href="<?= base_url("index.php/CT_Optimisation/index")?>">Optimisation</a>
                  </div>
              </div>


              </nav>
            </div>

            <!-- ----------------------------------LISTE DES PRODUITS ----------------- -->
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card" >
                <div class="card" style="background-color:#FFFFFF;">
                  <div class="card-body">
                    <h4 class="card-title" style="color:black;">Produit</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="color:black;">Nom produit</th>
                            <th style="color:black;">Mise à jour</th>
                            <th style="color:black;">Unite</th>
                            <th style="color:black;">Volume unitaire</th>
                            <th style="color:black;">Update</th>
                            <th style="color:black;" >Delete</th>
                            <th style="color:black;" >Composition</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php foreach($produits as $produit) { ?>
                            <tr>
                              <td style="color:black;"><?= $produit->nomproduit ?></td>
                              <td style="color:black;"><?= $produit->date_ ?></td>
                              <td style="color:black;"><?= $produit->unite ?></td>
                              <td style="color:black;"><?= $produit->volume_unitaire ?></td>
                              <td style="color:black;"><a href="#" data-toggle="modal" data-target="#maModal">Update</a></td>
                              <td style="color:black;"><a href="<?= bu("CT_Produit/delete/".$produit->idproduit); ?>">Delete</a></td>
                              <td style="color:black;"><a href="<?= bu("CT_Produit/delete/".$produit->idproduit); ?>">Composition</a></td>
                            </tr>
                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- ----------------------------------LISTE DES PRODUITS ----------------- -->

            <!-- ---------------------------------- COMPOSITION ----------------- -->
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color:#FFFFFF;">
                  <div class="card-body">
                    <h4 class="card-title" style="color:black;">Compositions</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="color:black;"></th>

                            <?php for($i = 0 ; $i < count($matierepremieres) ; $i++){ ?>
                            <th  style="color:black;"><?= $matierepremieres[$i]->nommatierepremiere?> (<?= $matierepremieres[$i]->unite?>)</th>
                            <?php } ?>
                            
                          </tr>
                        </thead>
                        <tbody>

                          <?php foreach($produits as $produit) { ?>
                            <tr>
                              <td><?= $produit->nomproduit ?></td>

                              <?php foreach($matierepremieres as $matierepremiere){ ?>
                                <td style="color:black;"><?= $productComposers[$produit->idproduit][$matierepremiere->idmatierepremiere]->quantite ?></td>
                              <?php }?>

                            </tr>
                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- ---------------------------------- COMPOSITION ----------------- -->


            <!-- -------------------------------- AJOUT PRODUIT ------------------------- -->
            <div class="row">
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color: #FFFFFF;">
                  <div class="card-body">
                    <h4 class="card-title" style="color:black;" >Ajout nouveau Produit</h4>
                    <div class="table-responsive">
                      <form  action="<?= bu('CT_Produit/store');?>" method="post">
                      
                        <table class="table">
                          <thead>
                            <tr>
                              <td style="color:black;">Nom</td>
                              <td style="color:black;">Date d` ajout</td>
                              <td style="color:black;">Volume unitaire</td>
                              <td style="color:black;">Unite</td>
                              <td style="color:black;">Prix unitaire</td>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td style="color:black;"><input class="champ" type="text" name="nom" id="nom"></td>
                              <td style="color:black;"><input class="champ" type="date" name="date_" id="Date"></td>
                              <td style="color:black;"><input class="champ" type="number" name="volumeunitaire" id="volumeunitaire"></td>
                              <td style="color:black;"><input class="champ" type="text" name="unite" id="unite"></td>
                              <td style="color:black;"><input class="champ" type="number" name="prix" id="prix"></td>
                            </tr>

                          </tbody>
                        </table>
                        <input style="margin:auto;"id="validation" type="submit" value="Valider">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------------------- AJOUT PRODUIT ------------------------- -->

          </div>
        </div>
        
          </div>
          </div>
          </div>

          <!-- Modal -->
<div class="modal fade" id="maModal" tabindex="-1" role="dialog" aria-labelledby="maModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="maModalLabel">Formulaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="<?= bu('CT_Produit/update')?>" method="post">
          <label class="titre" for="nomProduit">Nom</label>

          <select class="champ" type="text" name="idproduit" id="nomProduit">
            <?php foreach($produits as $produit) { ?>
              <option value="<?= $produit->idproduit?>"><?= $produit->nomproduit?></option>
            <?php } ?>
          </select>

          <label class="titre" for="date_">Date</label>
          <input class="champ" type="date" name="date_" id="date_" required>
          <label class="titre" for="volume_unitaire">Volume unitaire</label>
          <input class="champ" type="number" name="volume_unitaire" id="volume_unitaire" required>
          <label class="titre" for="unite">Unite</label>
          <input class="champ" type="text" name="unite" id="unite" required>
          <label class="titre" for="Prix">Prix Unitaire</label>
          <input class="champ" type="number" name="prix" id="Prix" required>
          <input id="validation" type="submit" value="Valider">
        </form>
      </div>
    </div>
  </div>
</div>

          <!-- content-wrapper ends -->
          
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url("assets/js/vendor.bundle.base.js"); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="<?= base_url("assets/vendor/jquery/jquery-3.2.1.min.js"); ?>"></script>
    <script>
  $(document).ready(function() {
    $('#maModal').modal('hide'); // Cacher la modal par défaut
    $('.formulaire').trigger('reset'); // Réinitialiser le formulaire

    $('a[data-toggle="modal"]').on('click', function(e) {
      e.preventDefault();
      var targetModal = $(this).data('target');
      $(targetModal).modal('show');
    });
  });

      


</script>


    <script src="<?= base_url("assets/js/off-canvas.js"); ?>"></script>
    <script src="<?= base_url("assets/js/hoverable-collapse.js"); ?>"></script>
    <script src="<?= base_url("assets/js/misc.js");?>"></script>
    <script src="<?= base_url("assets/js/settings.js");?>"></script>
    <script src="<?= base_url("assets/js/todolist.js");?>"></script>
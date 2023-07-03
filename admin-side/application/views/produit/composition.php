
<style>
.dropdown {
  position: relative;
  display: inline-block;
}
#validation{
        float:right;
        background-color: #61FF7E;
      }
.dropbtn {
  background-color: red;
  padding: 10px;
}

.dropdown-content {
  display: none;
  position: absolute;
}

.dropdown:hover .dropdown-content {
  display:block;
}
table{
  font-size: 16px;
}
.main{
  font-size: 16px;
  background-color: white;
}
.valider{
  float: right;
  border: 1px;
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
      .card-body{
     background-color: #F1F4F7;
   
      }

</style>
    
    <link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">
    <!-- End layout styles -->
   
        <!-- partial -->
        <div class="main-panel main" style="font-size: 16px; background-color: white;">
          <div class="content-wrapper"  style="font-size: 16px;background-color: white;" >
            <div class="page-header">
              <h3 class="page-title" style="color: black;">Gestion de composition des produits</h3>
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

            <!-- ---------------------------------- COMPOSITION ----------------- -->
            <div class="row" >

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" >
                  <div class="card-body" >
                    <h4 class="card-title" style="color: black;">Compositions</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="color: black;" >Nom Produit</th>

                            <?php for($i = 0 ; $i < count($matierepremieres) ; $i++){ ?>
                            <th style="color: white;"><?= $matierepremieres[$i]->nommatierepremiere?> (<?= $matierepremieres[$i]->unite?>)</th>
                            <?php } ?>

                            <th style="color: black;" >Date</th>
                            <th></th>
                            
                          </tr>
                        </thead>
                        <tbody>

                          <?php foreach($produits as $produit) { ?>
                            <form action="<?= bu('CT_CompositionProduit/UpdateComposition')?>" method="post">
                              <input type="hidden" value="<?= $produit->idproduit?>" name="idproduit">
                              <tr>
                                <td><?= $produit->nomproduit ?></td>

                                <?php foreach($matierepremieres as $matierepremiere){ ?>
                                  <td>
                                    <input name="<?= "C".$produit->idproduit."_".$matierepremiere->idmatierepremiere?>" type="text" value="<?= $productComposers[$produit->idproduit][$matierepremiere->idmatierepremiere]->quantite ?>">
                                  </td>
                                <?php }?>

                                <td><input type="date" name="date_" class="date"></td>

                                <td>
                                  <button class="btn-primary" type="submit" id="validation" >
                                    UPDATE
                                  </button>
                                 
                                </td>
                                  
                              </tr>
                            </form>
                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- ---------------------------------- COMPOSITION ----------------- -->

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
        <form  action="#" method="post">
          <label class="titre" for="nomProduit">Nom</label>
          <input class="champ" type="text" name="nom" id="nomProduit"><br>
          <label class="titre" for="Daty">daty</label>
          <input class="champ" type="date" name="daty" id="Daty">
          <label class="titre" for="quantite">Quantite</label>
          <input class="champ" type="number" name="quantite" id="quantite">
          <label class="titre" for="Prix">Prix Unitaire</label>
          <input class="champ" type="number" name="prix" id="Prix">
          <input id="validation" class="valider" type="submit" value="Valider">
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
<script>
    // Obtention de la date actuelle
    var dateActuelle = new Date().toISOString().split("T")[0];

    // Récupération de l'élément input par son ID
    var inputs = document.getElementsByClassName("date");
    
    // Définition de la valeur par défaut pour chaque élément
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].value = dateActuelle;
    }
</script>


    <script src="<?= base_url("assets/js/off-canvas.js"); ?>"></script>
    <script src="<?= base_url("assets/js/hoverable-collapse.js"); ?>"></script>
    <script src="<?= base_url("assets/js/misc.js");?>"></script>
    <script src="<?= base_url("assets/js/settings.js");?>"></script>
    <script src="<?= base_url("assets/js/todolist.js");?>"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
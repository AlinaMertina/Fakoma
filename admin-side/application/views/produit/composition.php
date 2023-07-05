
<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Gestion de composition des produits</h3>
      <nav aria-label="breadcrumb">
        <div class="dropdown">
            <span class="mdi mdi-format-list-bulleted dropdown-item"></span>
            <div class="dropdown-content">
                <a class="dropdown-item" href="<?= bu("CT_Produit") ?>">Production </a>
                <a class="dropdown-item" href="<?= bu("CT_MatierePremiere") ?>">Matiere Premiere </a>
                <a class="dropdown-item" href="<?= bu("CT_CompositionProduit") ?>">Composition</a>
                <a class="dropdown-item" href="<?= bu("CT_Optimisation") ?>">Optimisation</a>
            </div>
        </div>
      </nav>
    </div>

    <!-- ---------------------------------- COMPOSITION ----------------- -->
    <div class="row">

      <?php foreach($produits as $produit) { ?>
        <div class="col-lg-6 col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

                
                <h4 class="card-title"><?= $produit->nomproduit?></h4>
                <div class="table-responsive">

                <table class="table">
                  <tbody>
                    
                    <form action="<?= bu('CT_CompositionProduit/UpdateComposition')?>" method="post">
                      <?php foreach($matierepremieres as $matierepremiere){ ?>
                        <input type="hidden" value="<?= $produit->idproduit?>" name="idproduit">
                        <tr>
                          <td><?= $matierepremiere->nommatierepremiere?></td>
                          <td>
                            <input name="<?= "C".$produit->idproduit."_".$matierepremiere->idmatierepremiere?>" type="text" value="<?= $productComposers[$produit->idproduit][$matierepremiere->idmatierepremiere]->quantite ?>">
                          </td>

                        </tr>
                      <?php } ?>
                      <tr>
                        <td><input  class="form-control" type="date" name="date_" class="date"></td>
                        <td>
                          <button class="btn btn-primary" type="submit">
                            UPDATE
                          </button>
                        </td>
                      </tr>
                    </form>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
    <!-- ---------------------------------- COMPOSITION ----------------- -->

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
          <input id="validation" type="submit" value="Valider">
        </form>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url("assets/js/vendor.bundle.base.js"); ?>"></script>

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
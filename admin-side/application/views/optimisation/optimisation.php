<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">


<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Aide de production</h3>
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

    <?php if(isset($error)){ ?>

      <div class="alert danger">
        <?= $error?>
      </div>

    <?php }else{ ?>

      <div class="row">

        <div class="col-lg-8 col-md-8 offset-2 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Disponibitile des ressources</h4>
              <div class="table-responsive">
                <form action="<?= bu('CT_Optimisation/VariedData')?>" method="post">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Composant</th>
                        <th>Ressource disponible</th>
                        <th>Variation</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php foreach($Remainingmatierepremieres as $Remainingmatierepremiere) { ?>
                        <tr>
                          <td><?= $Remainingmatierepremiere->nommatierepremiere?></td>
                          <td><?= $Remainingmatierepremiere->reste?> (<?=$Remainingmatierepremiere->unite?>)</a></td>
                          <td>
                            <input type="text" value="0" required name="<?= $Remainingmatierepremiere->idmatierepremiere?>">
                          </td>
                        </tr>
                      <?php } ?>
                      <tr>
                        <td colspan="<?= count($Remainingmatierepremieres) + 1?>"></td>
                        <td><input id="validation" type="submit" value="Optimiser"></td>
                      </tr>

                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Proposition de production</h4>
              <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Produit</th>
                      <th>Quantité</th>
                      <th>Prix unitaire</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($produits as $produit){ ?>
                    <tr>
                      <td><?= $produit->nomproduit?></td>
                      <td><?= $produit->maximize?></td>
                      <td><?= $produit->prix?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">-------------------------------------------------------------</h4>
                  <canvas id="pieChart" style="height:250px"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Reste associe a cette proposition</h4>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Composant</th>
                      <th>Reste</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach($restes as $reste){ ?>
                    <tr>
                      <td><?= $reste->nommatierepremiere?></td>
                      <td><?= $reste->reste_apres?></td>
                    </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>

    <?php } ?>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('#maModal').modal('hide');        // Cacher la modal par défaut
    $('.formulaire').trigger('reset');  // Réinitialiser le formulaire

    $('a[data-toggle="modal"]').on('click', function(e) {
      e.preventDefault();
      var targetModal = $(this).data('target');
      $(targetModal).modal('show');
    });
  });
</script>

<script src="<?= base_url("assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
<script src="<?= base_url("assets/vendors/chart.js/Chart.min.js");?>"></script>
<script src="<?= base_url("assets/js/off-canvas.js"); ?>"></script>
<script src="<?= base_url("assets/js/hoverable-collapse.js"); ?>"></script>
<script src="<?= base_url("assets/js/misc.js"); ?>"></script>
<script src="<?= base_url("assets/js/settings.js"); ?>"></script>
<script src="<?= base_url("assets/js/todolist.js"); ?>"></script>


<!-- ----------------- INSERER LES DONNER DU GRAPHE -------------------- -->

<script src="<?= base_url("assets/jsfunction/Johan.js"); ?>"></script>

<?php $json_produits = json_encode($produits);?>

<script>
  var json_produits = <?php echo $json_produits; ?>;
  var result = extractJsonToPieFormProduct(json_produits);

  var pieChartCanvas = document.getElementById('pieChart');
  var pieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: {
      labels: result.nomProduits,
      datasets: [{
        data: result.maximizes,
        backgroundColor: result.colors,
        borderColor: result.borderColors
      }]
    }
  });
</script>
<!-- ----------------- INSERER LES DONNER DU GRAPHE -------------------- -->
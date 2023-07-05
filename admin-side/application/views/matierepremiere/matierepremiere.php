<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Gestion de matiere premiere</h3>
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

    <!-- ------------------------- LISTE MATIERE PREMIERE ------------------- -->
    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste(s)</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Matiere premiere</th>
                    <th>Unité</th>
                    <th>Mise à jour</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach($matierepremieres as $matierepremiere) { ?>
                    <tr>
                      <td><?= $matierepremiere->nommatierepremiere ?></td>
                      <td><?= $matierepremiere->unite ?></td>
                      <td><?= $matierepremiere->date_ ?></td>
                      <td><a href="#"data-toggle="modal" data-target="#maModal"><span class="mdi mdi-border-color" style="color: #2f2fff;font-size:25px;" ></span></a></td>
                      <td><a href="<?= bu("CT_MatierePremiere/delete/".$matierepremiere->idmatierepremiere); ?>"><span class="mdi mdi-window-close" style="color: #ff5151;font-size:25px;"></span></a></td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- ------------------------- LISTE MATIERE PREMIERE ------------------- -->

    <!-- ------------------------- ENTRER MATIERE PREMIERE ------------------- -->
    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Entrer</h4>
            <div class="table-responsive">
              <form  action="<?= bu('CT_MatierePremiere/entrerMTP');?>" method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <td>Matiere premiere</td>
                      <td>Date d` entrer</td>
                      <td>Quantite</td>
                      <td>Cout unitaire</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <select class="form-control" name="idmatierepremiere" id="">
                          <?php foreach($matierepremieres as $matierepremiere) { ?>
                            <option value="<?= $matierepremiere->idmatierepremiere?>"><?= $matierepremiere->nommatierepremiere?></option>
                          <?php } ?>
                        </select>
                      </td>
                      <td><input class="form-control" type="date" name="date_"></td>
                      <td><input class="form-control" type="text" name="quantite"></td>
                      <td><input class="form-control" type="text" name="pu"></td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                      <td><input id="validation" type="submit" value="Valider"></td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- ------------------------- ENTRER MATIERE PREMIERE ------------------- -->

    <!-- ------------------------- SORTIE MATIERE PREMIERE ------------------- -->
    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sortie/Utilisation</h4>
            <div class="table-responsive">
              <form  action="<?= bu('CT_MatierePremiere/sortieMTP');?>" method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <td>Matiere premiere</td>
                      <td>Date de sortie</td>
                      <td>Quantite</td>
                      <td>Cout unitaire</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td>
                        <select class="form-control" name="idmatierepremiere" id="">
                          <?php foreach($matierepremieres as $matierepremiere) { ?>
                            <option value="<?= $matierepremiere->idmatierepremiere?>"><?= $matierepremiere->nommatierepremiere?></option>
                          <?php } ?>
                        </select>
                      </td>
                      <td><input class="form-control" type="date" name="date_"></td>
                      <td><input class="form-control" type="text" name="quantite"></td>
                      <td><input class="form-control" type="text" name="pu"></td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                      <td><input id="validation" type="submit" value="Valider"></td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- ------------------------- SORTIE MATIERE PREMIERE ------------------- -->



    <div class="row">
      
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Ajout</h4>
            <div class="table-responsive">
              <form  action="<?= bu('CT_MatierePremiere/store');?>" method="post">
                
                <table class="table">
                  <thead>
                    <tr>
                      <td>N ~ compte</td>
                      <td>Nom</td>
                      <td>Date d` ajout</td>
                      <td>Unite</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input class="form-control" type="number" name="numero" id="numero"></td>
                      <td><input class="form-control" type="text" name="nom" id="nom"></td>
                      <td><input class="form-control" type="date" name="date_" id="Date"></td>
                      <td><input class="form-control" type="text" name="unite" id="unite"></td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <td><input id="validation" type="submit" value="Valider"></td>
                    </tr>
                  </tbody>
                </table>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ---------------------------------------------------------------------------- -->
  </div>
</div>

<!------------------------------------------ MODAL ------------------------------>
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
        <form  action="<?= bu('CT_MatierePremiere/update')?>" method="post">

          <label class="titre" for="idmatierepremiere">Matière premiere à modifier</label>
          <select class="form-control" name="idmatierepremiere" id="idmatierepremiere">
            <?php foreach($matierepremieres as $matierepremiere) { ?>
              <option value="<?= $matierepremiere->idmatierepremiere?>"><?= $matierepremiere->nommatierepremiere?></option>
            <?php } ?>
          </select>

          <label class="titre" for="date_">Date du modification</label>
          <input class="form-control" type="date" name="date_" id="date_" class="date">
          <label class="titre" for="unite">Unité</label>
          <input class="form-control" type="text" name="unite" id="unite">
          <input id="validation" type="submit" value="Valider">
        </form>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------ MODAL ------------------------------>

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
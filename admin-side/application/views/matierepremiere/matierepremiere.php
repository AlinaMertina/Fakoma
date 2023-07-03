
    <!-- plugins:css -->
    
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <style>
      h4{
        color: black;
      }
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
          <div class="content-wrapper" style="background-color: white;">
            <div class="page-header">
              <h3 class="page-title" style="color: black;">Gestion de matiere premiere</h3>
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

            <!-- ------------------------- LISTE MATIERE PREMIERE ------------------- -->
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="background-color: #A6EBC9;">
                    <h4 class="card-title" style="color:black">Matiere premiere</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="color:black" >Matiere premiere</th>
                            <th style="color:black" >Unité</th>
                            <th style="color:black" >Mise à jour</th>
                            <th style="color:black" >Update</th>
                            <th style="color:black" >Delete</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php foreach($matierepremieres as $matierepremiere) { ?>
                            <tr>
                              <td style="color:black;"><?= $matierepremiere->nommatierepremiere ?></td>
                              <td style="color:black;" > <?= $matierepremiere->unite ?></td>
                              <td style="color:black;" ><?= $matierepremiere->date_ ?></td>
                              <td style="color: #17B2B5;"><a href="#"data-toggle="modal" data-target="#maModal" style="color: blue;" ><span class="mdi mdi-border-color" style="color: blue;font-size:20px;" ></span></a></td>
                              <td style="color: blue;" ><a href="<?= bu("CT_MatierePremiere/delete/".$matierepremiere->idmatierepremiere); ?>" style="color: blue;font-size:20px;" ><span class="mdi mdi-window-close" style="color: blue;"></span></a></td>
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
                  <div class="card-body" style="background-color: #A6EBC9;">
                    <h4 class="card-title" style="color:black">Entrer matiere premiere</h4>
                    <div class="table-responsive">
                      <form  action="<?= bu('CT_MatierePremiere/entrerMTP');?>" method="post">
                        <table class="table">
                          <thead>
                            <tr>
                              <td style="color:black" >Matiere premiere</td>
                              <td style="color:black" >Date d` entrer</td>
                              <td style="color:black" >Quantite</td>
                              <td style="color:black" >Cout unitaire</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <select class="champ" name="idmatierepremiere" id="">
                                  <?php foreach($matierepremieres as $matierepremiere) { ?>
                                    <option value="<?= $matierepremiere->idmatierepremiere?>"><?= $matierepremiere->nommatierepremiere?></option>
                                  <?php } ?>
                                </select>
                              </td>
                              <td><input class="champ" type="date" name="date_"></td>
                              <td><input class="champ" type="text" name="quantite"></td>
                              <td><input class="champ" type="text" name="pu"></td>
                            </tr>
                           
                          </tbody>
                        </table>
                          <td><input id="validation" type="submit" value="Valider"></td>
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
                  <div class="card-body" style="background-color: #A6EBC9;">
                    <h4 class="card-title" style="color:black" >Sortie/Utilisation matiere premiere</h4>
                    <div class="table-responsive">
                      <form  action="<?= bu('CT_MatierePremiere/sortieMTP');?>" method="post">
                        <table class="table">
                          <thead>
                            <tr>
                              <td style="color:black" >Matiere premiere</td>
                              <td style="color:black" >Date de sortie</td>
                              <td style="color:black" >Quantite</td>
                              <td style="color:black" >Cout unitaire</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                            <td>
                                <select class="champ" name="idmatierepremiere" id="">
                                  <?php foreach($matierepremieres as $matierepremiere) { ?>
                                    <option value="<?= $matierepremiere->idmatierepremiere?>"><?= $matierepremiere->nommatierepremiere?></option>
                                  <?php } ?>
                                </select>
                              </td>
                              <td><input class="champ" type="date" name="date_"></td>
                              <td><input class="champ" type="text" name="quantite"></td>
                              <td><input class="champ" type="text" name="pu"></td>
                            </tr>
                           
                          </tbody>
                        </table>
                         <td><input id="validation" type="submit" value="Valider"></td>
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
                  <div class="card-body" style="background-color: #A6EBC9;">
                    <h4 class="card-title" style="color:black" >Nouvelle matiere premiere</h4>
                    <div class="table-responsive">
                      <form  action="<?= bu('CT_MatierePremiere/store');?>" method="post">
                        
                        <table class="table">
                          <thead>
                            <tr>
                              <td style="color:black" >Nom</td>
                              <td style="color:black" >Date d` ajout</td>
                              <td style="color:black" >Unite</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input class="champ" type="text" name="nom" id="nom"></td>
                              <td><input class="champ" type="date" name="date_" id="Date"></td>
                              <td><input class="champ" type="text" name="unite" id="unite"></td>
                            </tr>
                          </tbody>
                        </table>
                          <td><input id="validation" type="submit" value="Valider"></td>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ---------------------------------------------------------------------------- -->
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
        <form  action="<?= bu('CT_MatierePremiere/update')?>" method="post">

          <label class="titre" for="idmatierepremiere">Matière premiere à modifier</label>
          <select class="champ" name="idmatierepremiere" id="idmatierepremiere">
            <?php foreach($matierepremieres as $matierepremiere) { ?>
              <option value="<?= $matierepremiere->idmatierepremiere?>"><?= $matierepremiere->nommatierepremiere?></option>
            <?php } ?>
          </select>

          <label class="titre" for="date_">Date du modification</label>
          <input class="champ" type="date" name="date_" id="date_" class="date">
          <label class="titre" for="unite">Unité</label>
          <input class="champ" type="text" name="unite" id="unite">
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
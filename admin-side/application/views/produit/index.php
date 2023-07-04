
<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Gestion des produits</h3>
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

        <!-- ----------------------------------LISTE DES PRODUITS ----------------- -->
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Produit</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom produit</th>
                                        <th>Mise à jour</th>
                                        <th>Unite</th>
                                        <th>Volume unitaire</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                        <th>Composition</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($produits as $produit) { ?>
                                    <tr>
                                        <td><?= $produit->nomproduit ?></td>
                                        <td><?= $produit->date_ ?></td>
                                        <td><?= $produit->unite ?></td>
                                        <td><?= $produit->volume_unitaire ?></td>
                                        <td><a href="#" data-toggle="modal" data-target="#maModal">Update</a></td>
                                        <td><a href="<?= bu("CT_Produit/delete/" . $produit->idproduit); ?>">Delete</a></td>
                                        <td><a href="<?= bu("CT_Composition"); ?>">Composition</a></td>
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


        <!-- -------------------------------- AJOUT PRODUIT ------------------------- -->
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajout nouveau Produit</h4>
                        <div class="table-responsive">
                            <form action="<?= bu('CT_Produit/store'); ?>" method="post">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Nom</td>
                                            <td>Date d` ajout</td>
                                            <td>Volume unitaire</td>
                                            <td>Unite</td>
                                            <td>Prix unitaire</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="champ" type="text" name="nom" id="nom"></td>
                                            <td><input class="champ" type="date" name="date_" id="Date"></td>
                                            <td><input class="champ" type="number" name="volumeunitaire"
                                                    id="volumeunitaire"></td>
                                            <td><input class="champ" type="text" name="unite" id="unite"></td>
                                            <td><input class="champ" type="number" name="prix" id="prix"></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <input id="validation" type="submit" value="Valider">
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
                <form action="<?= bu('CT_Produit/update') ?>" method="post">
                    <label class="titre" for="nomProduit">Nom</label>

                    <select class="champ" type="text" name="idproduit" id="nomProduit">
                        <?php foreach ($produits as $produit) { ?>
                        <option value="<?= $produit->idproduit ?>"><?= $produit->nomproduit ?></option>
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


<script src="<?= base_url("assets/js/off-canvas.js"); ?>"></script>
<script src="<?= base_url("assets/js/hoverable-collapse.js"); ?>"></script>
<script src="<?= base_url("assets/js/misc.js"); ?>"></script>
<script src="<?= base_url("assets/js/settings.js"); ?>"></script>
<script src="<?= base_url("assets/js/todolist.js"); ?>"></script>
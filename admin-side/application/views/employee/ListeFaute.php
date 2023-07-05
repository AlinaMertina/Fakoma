<div class="main-panel">
    <div class="content-wrapper main">
        <div class="page-header">
            <h3 class="page-title"> Faute Employee : <?= $idemployer ?>
            </h3>
            <div class="col-3 d-flex justify-content-end">
                <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $idemployer; ?>"
                    class="btn btn-primary">Retour</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table tablec">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Faute</th>
                                        <th scope="col">Date de faute</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if ($faute) {
                    for ($i = 0; $i < count($faute); $i++) { ?>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?= $faute[$i]['description']; ?></td>
                                        <td><?= $faute[$i]['dateavertisement']; ?></td>

                                    </tr>
                                    <?php }
                  } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<div class="main-panel">
    <div class="content-wrapper main">
        <div class="modal-dialog modal-fullscreen main">
            <div class="modal-content main">
                <div class="modal-header d-flex justify-content-between">
                    <h4 class="modal-title" id="mediumModalLabel">Ajouter Tache emp :
                        <?php if (isset($idemployer)) {
                            echo $idemployer;
                        } ?>
                    </h4>
                    <div class="col-3" style="float:right;">
                        <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $identifiant; ?>" class="btn btn-primary">Retour</a>
                    </div>
                </div>
                <div class="model-body justify-content-around mt-3 p-3">
                    <div>
                        <div class="card sousmain">
                            <div class="card-body" style="height:10%;">
                                <h3> Ajouter une description simplifier de la tache
                                </h3>

                            </div>
                            <div class="card maininsert">
                                <form class="row g-3 px-3 formmain" id="employeeForm" method="POST" action="<?= base_url("index.php/CT_CRUD_Employer/setTache") ?>" enctype="multipart/form-data">
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" placeholder="description" name="description">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="time" class="form-control" name="time">
                                    </div>
                                    <div class="col-auto col-lg-12 mt-3 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mb-3">Valider</button>
                                    </div>
                                    <input type="hidden" class="form-control" name="identifiant" value="<?= $identifiant ?>">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
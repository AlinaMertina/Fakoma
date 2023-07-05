<div class="main-panel">
    <div class="content-wrapper main">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            Ajouter Nouvelle employees
                        </h3>
                        <div>
                            <form class="row g-3 px-3 formmain" id="employeeForm" method="POST" action="<?= base_url("index.php/CT_CRUD_Employer/insert_employer") ?>" enctype="multipart/form-data">

                                <div class="col-auto col-lg-12">
                                    <input type="text" class="form-control" placeholder="nom" name="nom_employer">
                                </div>
                                <div class="col-auto col-lg-12">
                                    <input type="text" class="form-control" placeholder="prenom" name="prenom_employer">

                                </div>
                                <div class="col-auto col-lg-12">
                                    <input type="text" class="form-control" placeholder="Tel" name="contact">
                                </div>
                                <div class="col-auto col-lg-12 ">
                                    <select class="form-control" aria-label="Select" name="idposte">
                                        <option selected>Poste</option>
                                        <?php if (isset($poste)) {
                                            for ($i = 0; $i < count($poste); $i++) { ?>
                                                <option value="<?= $poste[$i]['idposte'] ?>">
                                                    <?= $poste[$i]['nomposte'] ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-auto col-lg-12">
                                    <input type="number" class="form-control" placeholder="Salaire" name="salaire">
                                </div>
                                <div class="col-auto col-lg-12">
                                    <input type="date" class="form-control" placeholder="Date de naissance" name="dtn">
                                </div>
                                <div class="col-auto col-lg-12">
                                    <input type="date" class="form-control" placeholder="Date de entre" name="dateE">
                                </div>
                                <div class="col-auto col-lg-12">
                                    <input type="file" class="form-control" placeholder="Photo" name="photo">
                                </div>


                                <div class="col-auto col-lg-12 mt-3 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mb-3">Valider</button>
                                </div>


                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
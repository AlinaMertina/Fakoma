<!-- partial -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?= base_url("assets/css_perso/employee/poste.css") ?>">

<div class="main-panel">
    <div class="content-wrapper main">
        <div class="page-header">
            <h3 class="page-title"> Emplois du temp employer: <?php if (isset($idemployer)) {
                                                                    echo $idemployer;
                                                                }  ?>
            </h3>
            <div class="col-3 d-flex justify-content-end" style="float:right;">
                <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $idemployer; ?>" class="btn btn-primary">Retour</a>
            </div>
        </div>
        <div class="row sousmain">
            <div class="col-lg-12 grid-margin stretch-card sousmain">
                <div class="card sousmain">

                    <h3><?php if (isset($idemployer)) {
                            echo " <input type='hidden' name='idemployer' value=" . $idemployer . " >";
                        }  ?></h3>

                    <div id="emplois_du_temps" class="sousmain">
                        <div class="section1">
                            <?php if (isset($semaine)) {
                                for ($i = 0; $i < count($semaine) && count($emplois_du_temps); $i++) {  ?>
                                    <div class="jours_semain">
                                        <div class="check">
                                            <b><?= $semaine[$i] ?></b>
                                            <input type="checkbox" class="chek">
                                        </div>
                                        <div class="heur_travaille">
                                            <div class="heur">
                                                <p>Heure de traville</p>
                                                <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="T_debut[]" value="<?= $emplois_du_temps[$i]['t_debut'] ?>"></b>
                                                <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="T_fin[]" value="<?= $emplois_du_temps[$i]['t_fin'] ?>"></b>
                                            </div>
                                            <div class="heur">
                                                <p>Heure de Pausee</p>
                                                <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="P_debut[]" value="<?= $emplois_du_temps[$i]['p_debut'] ?>"></b>
                                                <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="P_fin[]" value="<?= $emplois_du_temps[$i]['p_fin'] ?>"></b>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
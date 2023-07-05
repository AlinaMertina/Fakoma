<link rel="stylesheet" href="<?= base_url("assets/css_perso/employee/poste.css") ?>">
<div class="main-panel">
    <div class="content-wrapper main">
        <div class="page-header">
            <h3 class="page-title"> Emplois du temp employer <?php if (isset($idemployer)) {
                                                                    echo $idemployer;
                                                                }  ?>
            </h3>
        </div>
        <div class="row sousmain">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <form class="card-body"
                        action="<?= base_url("index.php/CT_CRUD_Employer/insert_modification_emplois_emp") ?>"
                        method="post">
                        <h3><?php if (isset($idemployer)) {
                                echo " <input type='hidden' name='idemployer' value=" . $idemployer . " >";
                            }  ?></h3>

                        <div id="emplois_du_temps">
                            <div class="section1">
                                <?php if (isset($semaine)) {
                                    for ($i = 0; $i < count($semaine); $i++) {  ?>
                                <div class="jours_semain">
                                    <div class="check">
                                        <b><?= $semaine[$i] ?></b>
                                        <input type="checkbox" class="chek">
                                    </div>
                                    <div class="heur_travaille">
                                        <div class="heur">
                                            <p>Heure de traville</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1"
                                                    name="T_debut[]"
                                                    value="<?= $emplois_du_temps[$i]['t_debut'] ?>"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1"
                                                    name="T_fin[]" value="<?= $emplois_du_temps[$i]['t_fin'] ?>"></b>
                                        </div>
                                        <div class="heur">
                                            <p>Heure de Pausee</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1"
                                                    name="P_debut[]"
                                                    value="<?= $emplois_du_temps[$i]['p_debut'] ?>"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1"
                                                    name="P_fin[]" value="<?= $emplois_du_temps[$i]['p_fin'] ?>"></b>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                } ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
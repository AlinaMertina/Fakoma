<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Employee schedule management </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <form class="card-body" action="<?= base_url("index.php/CT_CRUD_Employer/insert_post") ?>" method="post">
                        <h3><?php if (isset($semaine)) {
                                echo $emplois_du_temps[0]['nom_poste'] . " <input type='hidden' name='idposte' value=" . $emplois_du_temps[0]['idposte'] . " >";
                            }  ?>
                        </h3>

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
                                                    <b>Debut<input type="text" style="color:white" class="form-control" id="exampleInputPassword1" name="T_debut[]" value="<?= $emplois_du_temps[$i]['t_debut'] ?>"></b>
                                                    <b>Fin<input type="text" style="color:white" class="form-control" id="exampleInputPassword1" name="T_fin[]" value="<?= $emplois_du_temps[$i]['t_fin'] ?>"></b>
                                                </div>
                                                <div class="heur">
                                                    <p>Heure de Pausee</p>
                                                    <b>Debut<input type="text" style="color:white" class="form-control" id="exampleInputPassword1" name="P_debut[]" value="<?= $emplois_du_temps[$i]['p_debut'] ?>"></b>
                                                    <b>Fin<input type="text" style="color:white" class="form-control" id="exampleInputPassword1" name="P_fin[]" value="<?= $emplois_du_temps[$i]['p_fin'] ?>"></b>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
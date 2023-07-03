<style>
    /* #0184C8
    #7EC7A8
    #101B3B
    #F1F4F7
    #07A7C5 */
    input {
        color: white;
    }

    .section1 {
        display: flex;
        width: 100%;
        height: 25%;
    }

    .jours_semain b {
        font-size: 12px;
        margin-bottom: 6%;
    }

    .jours_semain input {
        background-color: black;
        height: 7%;
    }

    .jours_semain {
        display: inline-block;
        margin: 5%;
        font-size: 11px;
        border-radius: 5px;
        border: 1px solid black;
        padding: 10px;
    }

    .check {
        width: 100%;

        margin-bottom: 5%;
    }

    .chek {
        float: right;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Employee management </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <form class="card-body" id="form" action="<?= base_url("index.php/CT_CRUD_Employer/insert_post") ?>" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nom Poste</label>
                            <input type="text" style="color:white" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom_poste">
                        </div>

                        <div id="emplois_du_temps">
                            <div class="section1">
                                <div class="jours_semain">
                                    <div class="check">
                                        <b>Lundie</b>
                                        <input type="checkbox" class="chek">
                                    </div>
                                    <div class="heur_travaille">
                                        <div class="heur">
                                            <p>Heure de traville</p>
                                            <b>Debut<input type="text" style="color:white" class="form-control" id="exampleInputPassword1" name="T_debut[]" value="7:30"></b>
                                            <b>Fin<input type="text" style="color:white" class="form-control" id="exampleInputPassword1" name="T_fin[]" value="18:00"></b>
                                        </div>
                                        <div class="heur">
                                            <p>Heure de Pausee</p>
                                            <b>Debut<input type="text" style="color:white" class="form-control" id="exampleInputPassword1" name="P_debut[]" value="12:00"></b>
                                            <b>Fin<input type="text" style="color:white" class="form-control" id="exampleInputPassword1" name="P_fin[]" value="14:00"></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="jours_semain">
                                    <div class="check">
                                        <b>Mardie</b>
                                        <input type="checkbox" class="chek">
                                    </div>
                                    <div class="heur_travaille">
                                        <div class="heur">
                                            <p>Heure de traville</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="T_debut[]" value="7:30"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="T_fin[]" value="18:00"></b>
                                        </div>
                                        <div class="heur">
                                            <p>Heure de Pausee</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="P_debut[]" value="12:00"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="P_fin[]" value="14:00"></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="jours_semain">
                                    <div class="check">
                                        <b>Mercredie</b>
                                        <input type="checkbox" class="chek">
                                    </div>
                                    <div class="heur_travaille">
                                        <div class="heur">
                                            <p>Heure de traville</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="T_debut[]" value="7:30"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="T_fin[]" value="18:00"></b>
                                        </div>
                                        <div class="heur">
                                            <p>Heure de Pausee</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="P_debut[]" value="12:00"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="P_fin[]" value="14:00"></b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section1">
                                <div class="jours_semain">
                                    <div class="check">
                                        <b>Jeudie</b>
                                        <input type="checkbox" class="chek">
                                    </div>
                                    <div class="heur_travaille">
                                        <div class="heur">
                                            <p>Heure de traville</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="T_debut[]" value="7:30"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="T_fin[]" value="18:00"></b>
                                        </div>
                                        <div class="heur">
                                            <p>Heure de Pausee</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="P_debut[]" value="12:00"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="P_fin[]" value="14:00"></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="jours_semain">
                                    <div class="check">
                                        <b>Vendredi</b>
                                        <input type="checkbox" class="chek">
                                    </div>
                                    <div class="heur_travaille">
                                        <div class="heur">
                                            <p>Heure de traville</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="T_debut[]" value="7:30"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="T_fin[]" value="18:00"></b>
                                        </div>
                                        <div class="heur">
                                            <p>Heure de Pausee</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="P_debut[]" value="12:00"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="P_fin[]" value="14:00"></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="jours_semain">
                                    <div class="check">
                                        <b>Samedie</b>
                                        <input type="checkbox" class="chek">
                                    </div>
                                    <div class="heur_travaille">
                                        <div class="heur">
                                            <p>Heure de traville</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="T_debut[]" value="7:30"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="T_fin[]" value="18:00"></b>
                                        </div>
                                        <div class="heur">
                                            <p>Heure de Pausee</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="P_debut[]" value="12:00"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="P_fin[]" value="14:00"></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section1">
                                <div class="jours_semain">
                                    <div class="check">
                                        <b>Dimanche</b>
                                        <input type="checkbox" class="chek">
                                    </div>
                                    <div class="heur_travaille">
                                        <div class="heur">
                                            <p>Heure de traville</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="T_debut[]" value="7:30"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="T_fin[]" value="18:00"></b>
                                        </div>
                                        <div class="heur">
                                            <p>Heure de Pausee</p>
                                            <b>Debut<input type="text" class="form-control" id="exampleInputPassword1" name="P_debut[]" value="7:30"></b>
                                            <b>Fin<input type="text" class="form-control" id="exampleInputPassword1" name="P_fin[]" value="14:00"></b>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
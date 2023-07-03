<!-- partial -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?= base_url("assets/css_perso/employee/poste.css") ?>">
<style>
    /* #0184C8
    #7EC7A8
    #101B3B
    #F1F4F7
    #07A7C5 */
    input{
        color:white;
    }
    .main{
        background-color: #101B3B;
        font-size: medium;
        color:black;
    }
    #form{
        background-color: white;
        width: 80%;
        margin: 10%;
    }
    .section1{
        display: flex;
        width:100%;
        height: 25%;
        flex-wrap: wrap;
    }
    .jours_semain b{
        font-size: 12px;
        margin-bottom: 6%;
       
       
    }
    .jours_semain input{
        background-color: #07A7C5;
        height: 7%;
    }
    .jours_semain{
        display: inline-block;
         margin: 5%;
         font-size: 11px;
         border-radius: 5px;
         border: 1px solid black;
         padding: 10px;
         width: 20%;
         color: black;
       
         
    }
    .check{
        width: 100%;
       
        margin-bottom: 5%;
    }
    .chek{
        float: right;
    }
    h3{
        color: black;
    }
    .sousmain{
        background-color:#F1F4F5 ;
        color: black;
    }
</style>

<div class="main-panel">
    <div class="content-wrapper main">
        <div class="page-header">
            <h3 class="page-title"> Emplois du temp employer <?php if (isset($idemployer)) {  echo $idemployer; }  ?>  </h3>
            <div class="col-3" style="float:right;">
                                <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $idemployer; ?>" style="background-color: #101B3B;" class="btn btn-primary">Retour</a>
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
                       
                    <div class="col-3" style="float:right;">
                                <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $idemployer; ?>" style="background-color: #101B3B;" class="btn btn-primary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
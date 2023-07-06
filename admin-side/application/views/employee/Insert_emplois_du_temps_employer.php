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
        
        font-size: medium;
    }
    #form{
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
         color: white;
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
</style>

<div class="main-panel">
    <div class="content-wrapper main">
        <div class="page-header">
            <h3 class="page-title"> Emplois du temp employer <?php if (isset($idemployer)) {  echo $idemployer; }  ?>  </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <form class="card-body" action="<?= base_url("index.php/CT_CRUD_Employer/insert_emplois_du_temps_emp") ?>" method="post">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
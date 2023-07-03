
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
.main{
    background-color: #101B3B;
        border-color: white;
}
.tablec{
    background-color:#F1F4F5 ;
    color: black;
}
</style>
<div class="main-panel">
    <div class="content-wrapper main">
        <div class="page-header">
            <h3 class="page-title"> Tache Employee  : <?= $idemployer ?> 
                <div class="col-3" style="float:right;">
                                <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $idemployer; ?>" style="background-color: #101B3B;" class="btn btn-primary">Retour</a>
                </div>  
            </h3>
                <div class="col-3" style="float:right;">
                                <a href="<?= base_url("index.php/CT_CRUD_Employer/readEmploisdutemps") . "/" . $idemployer ?>" style="background-color: #101B3B;" class="btn btn-primary">Voir emplois d temps</a>
                </div>  
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">About</h4>
                        <div class="card-description d-flex justify-content-end">
                       
                        <a href="<?= base_url("index.php/CT_CRUD_Employer/ajoutTache") . "/" . $idemployer; ?>">  <button type="submit" class="btn btn-primary" style="float:right">+</button></a>
                        
                        </div>

                        <div class="table-responsive ">
                            <table class="table tablec ">
                                <thead>
                                            <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Semaine</th>
                                            <th scope="col">Heur Debut travaille</th>
                                            <th scope="col">Heur Fin travaille</th>
                                            <th scope="col">Heur Debut Pausse</th>
                                            <th scope="col">Heur Fin Pausse</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($presence) && count($presence)>0) {  ?>
                                        <tr>
                                            <th scope="row"> <?= $date ?></th>
                                            <td><?= $presence['nom_semain']?></td>
                                            <td><?= $presence['t_debut']?></td>
                                            <td><?= $presence['t_fin']?></td>
                                            <td><?= $presence['p_debut']?></td>
                                            <td><?= $presence['p_fin']?></td>
                                        </tr>
                                    <?php } ?>
                                    
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
<!-- main-panel ends -->


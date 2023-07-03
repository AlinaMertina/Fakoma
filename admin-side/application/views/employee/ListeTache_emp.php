<!-- partial -->
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
                <form action="<?= base_url("index.php/CT_CRUD_Employer/rechercheTache") ?>" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <input  style="background-color:#F1F4F5 ;color:black;" type="date" class="form-control" placeholder="recherche" name="date" >
                        </div>
                        <div class="col-3">
                            <input  style="background-color:#F1F4F5 ;color:black;" type="time" class="form-control" placeholder="recherche" name="time" >
                        </div>
                        <input  type="hidden"  name="identifiant"  value=<?= $idemployer ?>>
                        <div class="col">
                            <button type="submit" class="btn btn-primary"><i class='bi bi-search'></i></button>
                           
                        </div>
                    </div>
                </form>
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
                                        <th> # </th>
                                        <th> description  </th>
                                        <th> date time </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (isset($tache)) {
                                        for ($i = 0; $i < count($tache); $i++) { ?>
                                            <tr>
                                                <td class="py-1">  </td>
                                                <td> <?= $tache[$i]['description'] ?> </td>
                                                <td> <?= $tache[$i]['date'] ?> </td>
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
<!-- main-panel ends -->

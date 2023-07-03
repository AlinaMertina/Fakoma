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
.page-header{
        margin-left: 5%;
        margin-top: 2%;
    }
.page-header .dropdown {
    position: relative;
    display: inline-block;
}

    .page-header .dropdown-content {
    display: none;
    position: absolute;
    background-color: none;
    color: white;
    min-width: 160px;
    /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
    z-index: 1;
    
    }
        
    .page-header .dropdown:hover .dropdown-content {
    display: block;
    }
    
    .page-header .dropdown-item {
    /* padding: 12px 16px; */
    text-decoration: none;
    display: block;
    margin-right: 20%;
    margin-left: -100%;
    background-color: #141514;
    color: white;
    }

    .page-header .dropdown-item:hover {
    background-color: #A6EBC9;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper main" style="background-color: white;">
       
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color:#141514">
                    <div class="card-body">
                        <h4 class="card-title" >
                        <form action="<?= base_url("index.php/CT_CRUD_Employer/getAll_emp") ?>" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <input  style="background-color:#F1F4F5 ;color:black;" type="text" class="form-control" placeholder="recherche" name="mot" >
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary"><i class='bi bi-search'></i></button>
                                    
                                    </div>
                                </div>
                        </form>
                        </h4>
                        <div class="card-description d-flex justify-content-end">
                        
                        <a href="<?= base_url("index.php/CT_CRUD_Employer/ajoutEmployer") ?>">  <button type="submit" class="btn btn-primary" style="float:right">+</button></a>
                        
                        </div>

                        <div class="table-responsive " style="background-color: #A6EBC9;">
                            <table class="table tablec " style="background-color: #A6EBC9;">
                                <thead>
                                    <tr>
                                        <th style="color: black;"> Name </th>
                                        <th style="color: black;" > First name </th>
                                        <th style="color: black;" > Post </th>
                                        <th style="color: black;"> Date de naissance </th>
                                        <th style="color: black;" > Contact </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (isset($emp)) {
                                        for ($i = 0; $i < count($emp); $i++) { ?>
                                            <tr>
                                                <td class="py-1"> <?= $emp[$i]['identifiant'] ?> </td>
                                                <td> <?= $emp[$i]['nom_employer'] ?> </td>
                                                <td> <?= $emp[$i]['prenom_employer'] ?> </td>
                                                <td> <?= $emp[$i]['dtn'] ?> </td>
                                                <td> <?= $emp[$i]['contact'] ?> </td>
                                                <td>

                                                    <div class="btn-group">
                                                        <!-- <a href="<?= base_url("index.php/CT_CRUD_Employer/updateemployer") . "/" . $emp[$i]['identifiant'] ?>"> <button class="btn btn-primary" style="background-color:#F1F4F5 ;border:black;color:black;"><i class="bi bi-pen-fill"></i></button><a> -->
                                                       
                                                        <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $emp[$i]['identifiant'] ?>"><button style=" background-color: #61FF7E; border-color:#101B3B; color:black;" class="btn btn-primary">Detaille</button></a>
                                                    </div>
                                                </td>
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
<script>
    function addEmployee(event) {
        event.preventDefault();
        let employeeForm = document.getElementById('employeeForm');
        sendFormData(employeeForm, 'test', 'POST');
    }
</script>
<!-- partial -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<div class="main-panel">
    <div class="content-wrapper main">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <form action="<?= base_url("index.php/CT_CRUD_Employer/getAll_emp") ?>" method="POST">
                                <div class="d-flex align-items-center justify-content-end">
                                    <div>
                                        <input type="text" class="form-control" placeholder="recherche" name="mot">
                                    </div>
                                    <div class="mx-1">
                                        <button type="submit" class="btn btn-primary"><i class='bi bi-search'></i></button>
                                    </div>
                                </div>
                            </form>
                        </h4>
                        <div class="card-description d-flex justify-content-end">

                            <a href="<?= base_url("index.php/CT_CRUD_Employer/ajoutEmployer") ?>"> <button type="submit" class="btn btn-primary" style="float:right">+</button></a>

                        </div>

                        <div class="table-responsive">
                            <table class="table tablec">
                                <thead>
                                    <tr>
                                        <th> Name </th>
                                        <th> First name </th>
                                        <th> Date de naissance </th>
                                        <th> Contact </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (isset($emp)) {
                                        for ($i = 0; $i < count($emp); $i++) { ?>
                                            <tr>
                                                <td> <?= $emp[$i]['nom_employer'] ?> </td>
                                                <td> <?= $emp[$i]['prenom_employer'] ?> </td>
                                                <td> <?= $emp[$i]['dtn'] ?> </td>
                                                <td> <?= $emp[$i]['contact'] ?> </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $emp[$i]['identifiant'] ?>"><button class="btn btn-primary">Detaille</button></a>
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
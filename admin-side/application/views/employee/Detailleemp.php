<link rel="stylesheet" href="<?php echo base_url("assets/css_perso/employee/detail_emp.css");  ?>">
<div class="main-panel">
    <div class="content-wrapper main">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="employee-profile d-flex align-items-center">
                                <img src="<?php echo base_url("assets/imageemp") . "/image.jpg";  ?>" alt="" />
                                <p class="m-0">Alina Mertina</p>
                            </div>
                            <a href="<?= base_url("index.php/CT_CRUD_Employer/remove_employer") . "/" . $detaille['idemployer'] ?>"
                                class="btn btn-danger fire-button">Renvoyer</a>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <h4>Profile picture</h4>
                                <img src="<?php echo base_url("assets/imageemp") . "/image.jpg";  ?>" alt=""
                                    class="emp-photo" />
                                <div class="mt-5 employee-action-buttons d-flex flex-column">
                                    <a class="act btn btn-secondary"
                                        href="<?= base_url("index.php/CT_CRUD_Employer/updateemployer") . "/" . $detaille['idemployer'] ?>">Modification
                                        d'information</a>
                                    <a class="act btn btn-secondary"
                                        href="<?= base_url("index.php/CT_CRUD_Employer/modif_emplois_du_temp_emp") . "/" . $detaille['idemployer'] ?>">Changement
                                        d'emplois du temps</a>
                                    <a class="act btn btn-secondary"
                                        href="<?= base_url("index.php/CT_CRUD_Employer/readEmploisdutemps") . "/" . $detaille['idemployer'] ?>">Emplois
                                        du temps</a>
                                    <a class="act btn btn-secondary"
                                        href="<?= base_url("index.php/CT_CRUD_Employer/listfaute") . "/" . $detaille['idemployer'] ?>">Liste
                                        faute commise</a>
                                    <a class="act btn btn-secondary"
                                        href="<?= base_url("index.php/CT_CRUD_Employer/chart_nbr_absence_emp") . "/" . $detaille['idemployer'] ?>">Nombre
                                        d'absence</a>
                                    <a class="act btn btn-secondary"
                                        href="<?= base_url("index.php/CT_CRUD_Employer/selectTache") . "/" . $detaille['idemployer'] ?>">Voir
                                        les taches recents</a>
                                    <a class="act btn btn-secondary"
                                        href="<?= base_url("index.php/CT_CRUD_Employer/ajoutTache") . "/" . $detaille['idemployer'] ?>">Nouvelle
                                        tache specifique</a>
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Informations</p>
                                        <div class="employee-info text-dark" role="alert">
                                            <h5><b>Nom</b></h5>
                                            <p class="m-0"><?= $detaille['nom_employer'] ?></p>
                                        </div>
                                        <div class="employee-info text-dark" role="alert">
                                            <h5><b>Prenom</b></h5>
                                            <p class="m-0"><?= $detaille['prenom_employer'] ?></p>
                                        </div>
                                        <div class="employee-info text-dark" role="alert">
                                            <h5><b>Date de naissance</b></h5>
                                            <p class="m-0"><?= $detaille['dtn'] ?></p>
                                        </div>
                                        <div class="employee-info text-dark" role="alert">
                                            <h5><b>Date d'entree</b></h5>
                                            <p class="m-0"><?= $detaille['date_entrer'] ?></p>
                                        </div>
                                        <div class="employee-info text-dark" role="alert">
                                            <h5><b>Contact</b></h5>
                                            <p class="m-0"><?= $detaille['contact'] ?></p>
                                        </div>

                                        <div class="mt-5">
                                            <h5>Evolution salaire</h5>
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="offset-1 col-md-5 employee-forms" style="border-radius: 5px;">
                                        <form action="<?= base_url("index.php/CT_CRUD_Employer/voirpresence") ?>"
                                            method="POST">
                                            <label for="">Si present ?</label>
                                            <input type="hidden" name="idemployer"
                                                value="<?= $detaille['idemployer'] ?>" />

                                            <div class="d-flex align-items-center">
                                                <input type="date" class="form-control" name="date">
                                                <button class="btn btn-primary" type="submit"
                                                    style="margin-left: 5px;"><i class="bi bi-search"></i></button>
                                            </div>
                                        </form>
                                        <hr>
                                        <form action="<?= base_url("index.php/CT_CRUD_Employer/setAvertissement"); ?>"
                                            method="post" class="mt-3">
                                            <label for="">Ajout absence</label>
                                            <input type="hidden" name="identemp" value="<?= $detaille['idemployer'] ?>">
                                            <input type="date" class="form-control" name="date">
                                            <div class="d-flex justify-content-end">
                                                <input class="btn btn-primary mt-1" type="submit" value="OK" />
                                            </div>
                                        </form>
                                        <hr>
                                        <form
                                            action="<?= base_url("/index.php/CT_CRUD_Employer/insert_absence_emp"); ?>"
                                            method="post" class="mt-3">
                                            <label for="">Ajout faute</label>
                                            <input type="hidden" name="identifiant"
                                                value="<?= $detaille['idemployer'] ?>">
                                            <input type="text" placeholder="Description..." class="form-control"
                                                name="description">
                                            <input type="date" class="form-control" name="date">
                                            <div class="d-flex justify-content-end">
                                                <input class="btn btn-primary mt-1" type="submit" value="OK" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // <block:setup:1>
    const labels = <?= $label; ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: 'Moyenne Salaire',
            data: <?= $salaire; ?>,
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgb(75, 192, 192)'
            ],
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, config);
    </script>
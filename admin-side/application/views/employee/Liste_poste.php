<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> All posts </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <?php if (isset($poste)) {
                                    for ($i = 0; $i < count($poste); $i++) { ?>
                                        <tr>
                                            <td> <b><?= $poste[$i]['nomposte'] ?></b> </td>
                                            <td> <a href="<?= base_url("index.php/CT_CRUD_Employer/modif_emplois_du_temps_post?idpost=" . $poste[$i]['idposte']) ?>"><i class="mdi mdi-calendar-blank"></i> </td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
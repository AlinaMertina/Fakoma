<div class="main-panel ">
    <div class="content-wrapper main">
        <div class="modal-dialog modal-fullscreen main">
            <div class="modal-content main">
                <div class="modal-header d-flex justify-content-between">
                    <h4 class="modal-title" id="mediumModalLabel">Clicke image pour modifier la photo
                    </h4>
                    <a href="<?= base_url("index.php/CT_CRUD_Employer/modif_emplois_du_temp_emp") . "/" . $info['identifiant'] ?>">
                        <button class="btn" data-dismiss="modal" aria-label="Close">Emplois du temps </button></a>
                </div>
                <div class="model-body justify-content-around mt-3 p-3">
                    <div>
                        <div class="card sousmain">

                            <div class="card-body" style="height:10%;">
                                <a onclick="addphoto()"> <img src="<?php if (isset($info)) {
                                                                        echo base_url("assets/imageemp") . "/" . $info['identifiant'] . ".jpg";
                                                                    }  ?>" alt="Description de l'image" width="70px" height="70px" style="float:right;">
                                </a>
                            </div>
                            <div class="card maininsert">
                                <form class="row g-3 px-3 formmain" id="employeeForm" method="POST" action="<?= base_url("index.php/CT_CRUD_Employer/setUpload") ?>" enctype="multipart/form-data">

                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" value=" <?php if (isset($info)) {
                                                                                            echo $info['nom_employer'];
                                                                                        }  ?>" name="nom_employer">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" value=" <?php if (isset($info)) {
                                                                                            echo $info['prenom_employer'];
                                                                                        }  ?>" name="prenom_employer">

                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" value=" <?php if (isset($info)) {
                                                                                            echo $info['contact'];
                                                                                        }  ?>" name="contact">
                                    </div>
                                    <div class="col-auto col-lg-12 ">
                                        <select class="form-control" aria-label="Default select example" name="idposte">
                                            <option selected value="<?php if (isset($info)) {
                                                                        echo $info['idposte'];
                                                                    }  ?>">
                                                <?php if (isset($info)) {
                                                    echo $info['nomposte'];
                                                }  ?></option>
                                            <?php if (isset($poste)) {
                                                for ($i = 0; $i < count($poste); $i++) { ?>
                                                    <option value="<?= $poste[$i]['idposte'] ?>"><?= $poste[$i]['nomposte'] ?>
                                                    </option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" value=" <?php if (isset($info)) {
                                                                                            echo $info['montant'];
                                                                                        }  ?>" name="salaire">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" value=" <?php if (isset($info)) {
                                                                                            echo $info['dtn'];
                                                                                        }  ?>" name="dtn">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" value=" <?php if (isset($info)) {
                                                                                            echo $info['date_entrer'];
                                                                                        }  ?>" name="dateE">
                                    </div>
                                    <div class="col-auto col-lg-12" id="photo" style="display:none;">
                                        <input type="file" class="form-control" placeholder="Photo" name="photo">
                                    </div>
                                    <input type="hidden" name="identifiant" value="<?php if (isset($info)) {
                                                                                        echo $info['identifiant'];
                                                                                    }  ?>">

                                    <div class="col-6">
                                        <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $info['identifiant'] ?>" class="btn btn-primary">Retour</a>
                                    </div>
                                    <div class="col-auto col-lg-6 mt-3 d-flex justify-content-end">

                                        <button type="submit" class="btn btn-primary mb-3">Valider</button>
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
<script>
    function addphoto() {
        event.preventDefault();
        var photo = document.getElementById("photo");
        if (photo.style.display == "none") {
            photo.style.display = "block";
        } else {
            photo.style.display = "none";
        }

    }
</script>
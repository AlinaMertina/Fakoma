<style>
    .main{
        margin-top: -3%;
        background-color: #101B3B;
        border-color: white;
    }
    .sousmain{
        background-color:#F1F4F5 ;
        color:black;
    }
    .maininsert{
     background-color:#0184C8 ;
       margin-top: -5%;
    }
    .formmain{
        padding-top: 5%;
    }
    

    /* #0184C8 */
    /*#F1F4F5*/
</style>
    <div class="main-panel ">
        <div class="modal-dialog modal-fullscreen main">
            <div class="modal-content main">
                <div class="modal-header d-flex justify-content-between">
                    <h4 class="modal-title" id="mediumModalLabel">Clicke image pour modifier la photo
                    </h4>
                  <a href="<?= base_url("index.php/CT_CRUD_Employer/modif_emplois_du_temp_emp")."/".$info['identifiant'] ?>">  <button  style="background-color:#0184C8 ;" class="btn" data-dismiss="modal" aria-label="Close">Emplois du temps </button></a>
                </div>
                <div class="model-body justify-content-around mt-3 p-3">
                    <div>
                        <div class="card sousmain">
                       
                            <div class="card-body" style="height:10%;">
                               <a  onclick="addphoto()"> <img src="<?php if(isset($info)){ echo base_url("assets/imageemp")."/".$info['identifiant'].".jpg" ;}  ?>" alt="Description de l'image" width="70px" height="70px" style="float:right;"> </a>
                            </div>
                            <div class="card maininsert">
                                <form class="row g-3 px-3 formmain" id="employeeForm" method="POST" action="<?= base_url("index.php/CT_CRUD_Employer/setUpload") ?>" enctype="multipart/form-data">

                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" style=" background-color: #F1F4F5; color:black; margin:1%; border-color: white;" value=" <?php if(isset($info)){ echo $info['nom_employer'];}  ?>" name="nom_employer">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" style=" background-color: #F1F4F5; color:black;margin:1%;border-color: white; " value=" <?php if(isset($info)){ echo $info['prenom_employer'];}  ?>" name="prenom_employer">

                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" value=" <?php if(isset($info)){ echo $info['contact'];}  ?>" style=" background-color: #F1F4F5; color:black; border-color: white;margin:1%; " name="contact">
                                    </div>
                                    <div class="col-auto col-lg-12 " >
                                        <select class="form-control" aria-label="Default select example" style=" background-color: #F1F4F5; color:black; border-color: white;margin:1%; " name="idposte">
                                            <option selected value="<?php if(isset($info)){ echo $info['idposte'];}  ?>"> <?php if(isset($info)){ echo $info['nom_poste'];}  ?></option>
                                            <?php  if(isset($poste))
                                            {  for($i=0;$i<count($poste);$i++) { ?>
                                                <option value="<?= $poste[$i]['idposte']?>"><?= $poste[$i]['nom_poste']?></option>
                                            <?php } 
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-auto col-lg-12"> 
                                        <input type="text" class="form-control" value=" <?php if(isset($info)){ echo $info['montant'];}  ?>"  style=" background-color: #F1F4F5; color:black; border-color: white;margin:1%; " name="salaire">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" value=" <?php if(isset($info)){ echo $info['dtn'];}  ?>"  style=" background-color: #F1F4F5; color:black; border-color: white;margin:1%; " name="dtn">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" value=" <?php if(isset($info)){ echo $info['date_entrer'];}  ?>"  style=" background-color: #F1F4F5; color:black; border-color: white;margin:1%; " name="dateE">
                                    </div>
                                    <div class="col-auto col-lg-12" id="photo" style="display:none;">
                                        <input type="file" class="form-control" placeholder="Photo" style=" background-color: #F1F4F5; color:black; border-color: white;margin:1%; " name="photo">
                                    </div>
                                   <input type="hidden" name="identifiant" value="<?php if(isset($info)){ echo $info['identifiant'];}  ?>">

                                   <div class="col-6">
                                        <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $info['identifiant'] ?>" style="background-color: #101B3B;" class="btn btn-primary">Retour</a>
                                    </div>
                                    <div class="col-auto col-lg-6 mt-3 d-flex justify-content-end">
                                       
                                        <button type="submit" class="btn btn-primary mb-3" style=" background-color: #101B3B;">Valider</button>
                                    </div>
                                    

                                </form>
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
        if(photo.style.display=="none"){
            photo.style.display="block";
        }else{
            photo.style.display="none";
        }
       
    }

</script>

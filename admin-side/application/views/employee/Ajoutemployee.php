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
    <div class="main-panel " style="background-color: white;">
        <div class="modal-dialog modal-fullscreen main" style="background-color: white;">
            <div class="modal-content main" style="background-color:#141514;">
                <div class="modal-header d-flex justify-content-between">
                    <h4 class="modal-title" id="mediumModalLabel">Ajouter Nouvelle employees
                    </h4>
                    <button class="btn" data-dismiss="modal" aria-label="Close"><i class="mdi mdi-close"></i> </button>
                </div>
                <div class="model-body justify-content-around mt-3 p-3">
                    <div>
                        <div class="card sousmain" style="background-color: white;">
                            <div class="card-body" style="height:10%;">
                                <h3  style="color: black;">Completer tout les information
                                </h3>
                               
                            </div>
                            <div class="card maininsert" style="background-color:#A6EBC9;">
                                <form class="row g-3 px-3 formmain" id="employeeForm" method="POST" action="<?= base_url("index.php/CT_CRUD_Employer/insert_employer") ?>" enctype="multipart/form-data">

                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" style=" background-color: white; color:black; margin:1%; border-color: white;" placeholder="nom" name="nom_employer">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" style=" background-color: white; color:black;margin:1%;border-color: white; " placeholder="prenom" name="prenom_employer">

                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="text" class="form-control" placeholder="Tel" style=" background-color: white; color:black; border-color: white;margin:1%; " name="contact">
                                    </div>
                                    <div class="col-auto col-lg-12 " >
                                        <select class="form-control" aria-label="Default select example" style=" background-color: white; color:black; border-color: white;margin:1%; " name="idposte">
                                            <option selected>Poste</option>
                                            <?php  if(isset($poste))
                                            {  for($i=0;$i<count($poste);$i++) { ?>
                                                <option value="<?= $poste[$i]['idposte']?>"><?= $poste[$i]['nom_poste']?></option>
                                            <?php } 
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-auto col-lg-12"> 
                                        <input type="number" class="form-control" placeholder="Salaire"  style=" background-color: white; color:black; border-color: white;margin:1%; " name="salaire">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="date" class="form-control" placeholder="Date de naissance"  style=" background-color: white; color:black; border-color: white;margin:1%; " name="dtn">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="date" class="form-control" placeholder="Date de entre"  style=" background-color: white; color:black; border-color: white;margin:1%; " name="dateE">
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <input type="file" class="form-control" placeholder="Photo" style=" background-color: white; color:black; border-color: white;margin:1%; " name="photo">
                                    </div>
                                   

                                    <div class="col-auto col-lg-12 mt-3 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mb-3" style=" background-color:  #61FF7E;color:black;">Valider</button>
                                    </div>
                                    

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                      

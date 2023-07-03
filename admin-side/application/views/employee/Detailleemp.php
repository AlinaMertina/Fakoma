<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
    /* #0184C8
    #7EC7A8
    #F1F4F7
    #101B3B
    #07A7C5 */

    #corps{
        background-color:  #141514;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }
    #droit{
        width: 50%;
        float: right;
        background-color:#F1F4F7 ;
    }
    #gauche{
        width: 50%;
        float: left;
    }
    #description{
        height: 20%;
        width: 80%;
        margin-left: 10%;
        background-color:#F1F4F7 ;
        /* font-family: fantasy; */
        color:black;
        margin-bottom: 10%;
    }
    #info{
        /* font-family: fantasy; */
        color:black;
    }
    #information{
        color: black;
        margin-top: 8%;
        background-color: #141514;
    }
    #fonctionaliter{
        width: 100%;
        height: 300px;
        margin-right: -40%;
        
    }
    #fonct1{
        float: left;
        margin: 2%;
    }
    #fonct2{
        width: 50%;
        float: right;
        background-color:#F1F4F7 ;
        margin: 2%;
    }
    #fonct3{
        float: left;
        margin: 2%;
    }
    #fonct4{
        width: 50%;
        float: right;
        background-color:#F1F4F7 ;
        margin: 2%;
    }
    tr{
        background-color: #A6EBC9;
        color:black;
    }
    a{
        color: black;
    }
    </style>
<div class="main-panel ">
    <div id="corps" style="background-color: #141514;">
        <div id="droit">
            <div id="info" style="text-align: center;">
                        <b> Description de l'employer  </b>
                        <hr/>
                        <p><?php if(isset($detaille)){ echo $detaille['description']; } ?> </p>
                            <br>
                        <b style="text-align: right;"><?php if(isset($detaille)){ echo $detaille['dateavertisement']; } ?> </b>
                            <br>
                       
            </div>
            <div id="imageemp">
                <img src="<?php echo base_url("assets/imageemp")."/image.jpg" ;  ?>" alt="Description de l'image"  width="80%" height="300px" style="margin-left:10%;">
            </div>
            <div id="information" style="background-color:  #141514 ;padding:2%">
                    <table class="table" style="background-color:#141514 ;">
                                <tr style="border-color:white;" >
                                <th scope="col">Date de Entre</th>
                                </tr>
                                <tr>
                                    <td><?php echo $detaille['date_entrer']?></td>
                                </tr>
                                <tr style="border-color:white;" >
                                    <th scope="col">Date de Naissance</th>
                                </tr>
                                <tr>
                                    <td><?php echo $detaille['dtn']?></td>
                                </tr>
                                <tr style="border-color:white;" >
                                    <th scope="col">Contact</th>
                                </tr>
                                <tr>
                                    <td><?php echo $detaille['contact']?></td>
                                </tr>
                    </table>
                    
            </div>
        </div>
        <div id="gauche" style="background-color: #141514;">
            <div id="description" style="text-align: center;background-color:  #A6EBC9;" >
                        <h6 style="text-align: left;"><?php  if(isset($detaille)){ echo $detaille['identifiant']; } ?></h6>
                       
                        <b><?php if(isset($detaille)){ echo $detaille['nom_employer']."    ".$detaille['prenom_employer']; } ?> </b>
                            <br>
                           
                        <b>Poste: <?php if(isset($detaille)){ echo $detaille['nom_poste']; } ?> </b>
                            <br>
            </div>
            <div id="fonctionaliter">
                    <div id="fonct1">
                        <table class="table" style="background-color:#F1F4F7;">
                            <tr style="margin: 2%;">
                             <td style="background-color: #A6EBC9;color:black;" >  <a href="<?= base_url("index.php/CT_CRUD_Employer/updateemployer") . "/" . $detaille['identifiant'] ?>">Modification information </a> </td>
                            </tr>
                            <tr>
                                <td><a href="<?= base_url("index.php/CT_CRUD_Employer/modif_emplois_du_temp_emp") . "/" . $detaille['identifiant'] ?>"> Changement d'emplois du temps </a></td>
                            </tr>
                            <tr>
                            
                                <td><a href="<?= base_url("index.php/CT_CRUD_Employer/remove_employer") . "/" . $detaille['identifiant'] ?>"> Renvoyer employer</a></td>
                            </tr>

                        </table>
                    </div>
<div style="height:50%"></div>
                    <div id="fonct2">
                        <table class="table">
                            <tr>
                                <td><a href="<?= base_url("index.php/CT_CRUD_Employer/evolution_salaire_emp") . "/" . $detaille['identifiant'] ?>"> Evolution Salaire</a></td>
                            </tr>
                            <tr>
                                <td> <a href="<?= base_url("index.php/CT_CRUD_Employer/chart_nbr_absence_emp") . "/" . $detaille['identifiant'] ?>"> Nombre Abssence </a> </td>
                            </tr>
                            <tr>
                                <td> <a href="<?= base_url("index.php/CT_CRUD_Employer/listfaute") . "/" . $detaille['identifiant'] ?>">  Liste Faute commise  </a> </td>
                            </tr>
                        </table>
                    </div>
<br>
                    <div id="fonct3" style="width:100%;">
                        <table class="table" style="background-color:#F1F4F7;width:50%;">
                            <tr>
                            
                                <td><a href="<?= base_url("index.php/CT_CRUD_Employer/setabsenceemp") . "/" . $detaille['identifiant'] ?>"> Ajout Abssence </a></td>
                            </tr>
                            <tr>
                                <td><a href="<?= base_url("index.php/CT_CRUD_Employer/insertfaute") . "/" . $detaille['identifiant'] ?>"> Ajouter Faute </a></td>
                            </tr>
                            <tr>
                                <td> <a href="<?= base_url("index.php/CT_CRUD_Employer/readEmploisdutemps") . "/" . $detaille['identifiant'] ?>"> Emplois du temps </a> </td>
                            </tr>

                        </table>
                    </div>
                    <div id="fonct4" style="background-color: #141514;">
                        <table class="table">
                            <tr>
                                <td> <a href="<?= base_url("index.php/CT_CRUD_Employer/ajoutTache") . "/" . $detaille['identifiant'] ?>"> Ajout Tache specifique </a> </td>
                            </tr>
                            <tr>
                            
                                <td> <a href="<?= base_url("index.php/CT_CRUD_Employer/selectTache") . "/" . $detaille['identifiant'] ?>">  Voir les tache recent </a> </td>
                            </tr>
                            <tr>
                            <td>
                                <p>Si present</p>
                                <form action="<?= base_url("index.php/CT_CRUD_Employer/voirpresence") ?>" method="POST">
                                    <div class="row">
                                        <div class="col-6">
                                            <input  style="background-color:#F1F4F5 ;color:black;" type="date" class="form-control" placeholder="recherche" name="date" >
                                        </div>
                                        <input  type="hidden"  name="identifiant"  value=<?= $detaille['identifiant'] ?>>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary"><i class='bi bi-search'></i></button>
                                        
                                        </div>
                                    </div>
                                </form>
                            </td>
                            </tr>

                        </table>
                    </div>
            </div>
        </div >
        
    </div>
</div>
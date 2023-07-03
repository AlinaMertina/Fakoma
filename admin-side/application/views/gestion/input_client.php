        <!-- partial -->
        <style>
             body{
                  
                }
                tr{
                  height: 10%;
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
          main{
            background-color: white;
          }
        </style>
        <div class="main-panel" style="background-color: white;">
              <div class="page-header">
                      <h3 class="page-title" style="color: black;margin-left:3%;display:flex;">Client</h3>
                      <nav aria-label="breadcrumb">
                        <div class="dropdown" >
                          <span class="mdi mdi-format-list-bulleted dropdown-item"></span>
                          <div class="dropdown-content">
                                <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/input_journal") ?>">Insert Journal </a>
                                <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/grand_livre") ?>">Grand Livre</a>
                                <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/input_client")?>">Client</a>
                                <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/input_facture")?>">Facture</a>
                                <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/input_compte")?>">Compte</a>
                                <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/list_journal")?>">Journale</a>
                                <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/resultat")?>">Resulta</a> 
                                <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/balance")?>">Balance</a>
                              
                            </div>
                        </div>
                      </nav>
              </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card" style="background-color: white;">
                  <div class="card-body" style="background-color: white;">  

                    <form action="<?php bu('CT_Gestion/insert_client')?>" method="post" >
                    <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Adress:</th>
                              <th scope="col">Mail:</th>
                              <th scope="col">Tel:</th>
                              <th scope="col">Valider</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row"></th>
                              <td><input id="credit" type="text" class="form-control" name="nom"></td>
                              <td><input id="credit" type="text" class="form-control" name="adresse"></td>
                              <td><input id="credit" type="text" class="form-control" name="mail"></td>
                              <td><input id="credit" type="text" class="form-control" name="tel"></td>
                              <td><button type="submit" class="btn btn-success">Valider</button></td>
                            </tr>
                          </tbody>
                    </table>

                        </form>
                    </div>
                    
                    <div class="table-responsive" style="background-color: #A6EBC9;">
                    <table class="table">
                        <thead>
                          <tr style="font-size: 25px;">
                            <th></th>
                            <th style="color: black;"> Nom  </th>
                            <th style="color: black;" > Adresse </th>
                            <th style="color: black;" >Mail</th>
                            <th style="color: black;" >Tel</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          for ($i=0; $i < count($client); $i++) { 
                             ?>
                               <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td> <?= $client[$i]['nomclient']?> </td>
                            <td> <?= $client[$i]['adresse']?> </td>
                            <td> <?= $client[$i]['mail']?> </td>
                            <td> <?= $client[$i]['tel']?> </td>
                            
                          </tr>
                             <?php
                          }
                          ?>
                        
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            </div>
        </div> 
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

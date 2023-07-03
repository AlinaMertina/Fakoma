
<style>
          body{
           
          }
          tr{
            height: 10%;
          }
        .page-header{
          margin-bottom: 6%;
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
        <div class="main-panel" style="background-color: white;">
          <div class="page-header" style="background-color: white;">
                        <h3 class="page-title" style="color: black;margin-left:3%;display:flex;">Balance</h3>
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
                  <div class="card-body" style="margin-top: 30px;background-color: #A6EBC9;" >  

                   
                   
                    
                    <div class="table-responsive"  style="background-color: #A6EBC9;">
                      <table class="table" style="background-color: #A6EBC9;" >
                        <thead>
                          <tr style="font-size: 25px;">
                            <th></th>
                            <th style="color:black;" > Compte </th>
                            <th style="color:black;" > Intitulé</th>
                            <th style="color:black;" > Mouvement</th>
                            <th style="color:black;" >  </th>
                            <th style="color:black;" > Solde </th>
                            <th style="color:black;"> </th>
                           
                          </tr>
                        </thead>
                        <thead>
                            <tr style="font-size: 25px;">
                              <th></th>
                              <th></th>
                              <th></th>
                              <th style="color:black;" >Debit</th>
                              <th style="color:black;" >Credit</th>
                              <th style="color:black;" >Debit</th>
                              <th style="color:black;" >Credit</th>
                            </tr>
                          </thead>
                        <tbody>
                          <?php
                          for ($i=0; $i < count($balance['liste']); $i++) { 
                            ?>
                              <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <!-- <input type="checkbox" class="form-check-input"> -->
                                </label>
                              </div>
                            </td>
                            <td style="color:black;"> <?= $balance['liste'][$i]['numero']?> </td>
                            <td style="color:black;" > <?= $balance['liste'][$i]['intitulecompte']?> </td>
                            <td style="color:black;" > <?= $balance['liste'][$i]['debit']?> </td>
                            <td style="color:black;" > <?= $balance['liste'][$i]['credit']?> </td>
                            <?php if($balance['liste'][$i]['solde']<0){
                              ?>
                              <td style="color:black;" >0 </td>
                              <td style="color:black;" > <?= -$balance['liste'][$i]['solde']?> </td>
                              <?php

                                  }
                                  else {
                                    ?>
                                    
                              <td style="color:black;" > <?= -$balance['liste'][$i]['solde']?> </td>
                              <td style="color:black;" >0 </td>
                                    <?php
                                  }
                                  ?>
                          </tr>
                            <?php
                          }
                          ?>
                          
                          
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <!-- <input type="checkbox" class="form-check-input"> -->
                                </label>
                              </div>
                            </td>
                            <td style="font-size: 25px;color:black;" > TOTAL </td>
                            <td> </td>
                            <td style="font-size: 25px; color: chartreuse;"> <?= $balance['total']['debit']?> </td>
                            <td style="font-size: 25px; color: red;"> <?= $balance['total']['credit']?></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
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
   
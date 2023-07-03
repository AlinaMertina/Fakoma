        <!-- partial -->
        <style>
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
                      <h3 class="page-title" style="color: black;margin-left:3%;display:flex;">Grand Livre</h3>
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
            <div class="row " >
              <div class="col-12 grid-margin" >
                <div class="card" >
                  <div class="card-body" style="margin-top: 100px;background-color: white;" >  
 
                    <div class="table-responsive" style="background-color:white;margin-top:-9%;border-color:none;">
                      <form action="<?php  bu('CT_Gestion/grand_livre')?>" method="get">
                        <table class="table">
                          
                          <tbody>
                            <tr>
                                <td style="color: black;">Compte</td>
                             
                                <td>
                                    <select class="form-control" id="sel1" name="idcompte">
                                        <?php 
                                        for ($i=0; $i < count($compte); $i++) { 
                                            ?>
                                            <option value="<?= $compte[$i]['id']?>"><?= $compte[$i]['numero']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                               </td> 
                               <td><button type="submit" class="btn btn-success">Valider</button></td>
                            </tr>
                          </tbody>
                        </table>  
                        </form>
                    </div>
                    <div class="table-responsive" style="margin-top: 5%;background-color:#A6EBC9;">
                      <table class="table">
                        <thead>
                          <tr style="font-size: 25px;">
                            <th></th>
                            <th style="color: black;">Code journal</th>
                            <th style="color: black;"> Date </th>
                            <th style="color: black;"> Piece</th>
                            <th style="color: black;"> Libellé </th>
                            <th style="color: black;"> Debit </th>
                            <th style="color: black;"> Credit </th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          for ($i=0; $i < count($grandlivre['liste']); $i++) { 
                             ?>
                               <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <!-- <input type="checkbox" class="form-check-input"> -->
                                </label>
                              </div>
                            </td>
                            <td style="color: black;" > <?= $grandlivre['liste'][$i]['codejournal']?> </td>
                            <td style="color: black;" > <?= $grandlivre['liste'][$i]['dat']?> </td>
                            <td style="color: black;" > <?= $grandlivre['liste'][$i]['piece']?> </td>
                            <td style="color: black;" >  <?= $grandlivre['liste'][$i]['libelle']?> </td>
                            <td style="color: black;" > <?= $grandlivre['liste'][$i]['debit']?> </td>
                            <td style="color: black;" > <?= $grandlivre['liste'][$i] ['credit']?> </td>
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
                           
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="color: black;" > Total </td>
                            <td style="color: black;"> <?= $grandlivre['total']['debit']?> </td>
                            <td style="color: black;" > <?= $grandlivre['total']['credit']?></td>
                          </tr>
                        </tbody>
                      </table>
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

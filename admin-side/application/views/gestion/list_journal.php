
        <!-- partial -->
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
        <div class="main-panel" style="background-color: white;width:100%;">
            <div class="page-header">
                    <h3 class="page-title" style="color: black;margin-left:3%;display:flex;">Journale</h3>
                    <nav aria-label="breadcrumb">
                      <div class="dropdown" >
                        <span class="mdi mdi-format-list-bulleted dropdown-item"></span>
                          <div class="dropdown-content">
                              <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/input_journal") ?>">Insert Journal </a>
                              <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/grand_livre") ?>">Balance</a>
                              <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/input_client")?>">Client</a>
                              <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/input_facture")?>">Facture</a>
                              <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/input_compte")?>">Compte</a>
                              <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/list_journal")?>">Journale</a>
                              <a class="dropdown-item" href="<?= base_url("index.php/CT_Gestion/resultat")?>">Resulta</a>
                            
                            </div>
                      </div>
                    </nav>
             </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card" style="margin-top: -5%;">
                  <div class="card-body" style=" background-color:#A6EBC9;">  
                  <form action="<?php bu('CT_Gestion/list_journal')?>" method="get" enctype="multipart/form-data">
                  <table class="table">
                      <thead>
                        <tr>
                          <th style="color: black;">#</th>
                          <th style="color: black;">Code Journal</th>
                          <th style="color: black;">Anne</th>
                          <th style="color: black;">Mois</th>
                          <th style="color: black;" >valider</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"></th>
                          <td> 
                              <select class="form-control" id="sel1" name="codejournal">
                                  <?php for ($i=0; $i < count($codejournal); $i++) { 
                                      ?><option value="<?= $codejournal[$i]['id']?>"><?= $codejournal[$i]['code']?></option><?php
                                  }?> 
                              </select> 
                          </td>
                          <td>
                            <select class="form-control" id="sel1" name="year">
                                <option value="2023">2023</option>
                            </select> 
                          </td>
                          <td>
                              <select class="form-control" id="sel1" name="month">
                                <option value="01">Janvier</option>
                                <option value="02">Fevrier</option>
                                <option value="03">Mars</option>
                                <option value="04">Avril</option>
                                <option value="05">Mai</option>
                                <option value="06">Juin</option>
                                <option value="07">Juillet</option>
                                <option value="08">Aout</option>
                                <option value="09">Septembre</option>
                                <option value="10">Octobre</option>
                                <option value="11">Novembre</option>
                                <option value="12">Decembre</option>
                            </select> 
                          </td>
                          <td>
                            <button type="submit" class="btn btn-success">Valider</button>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                   
                    </form>

                    </div>
                    
                    <div class="table-responsive">
                      <table class="table" style=" background-color:#A6EBC9;color:black;" >
                       
                          <tr>
                            <th  style="color: black;">Code journal</th>
                            <th> Date </th>
                            <th> Piece</th>
                            <th> Compte</th>
                            <th> Libellé </th>
                            <th>Unite</th>
                            <th>Quantite</th>
                            <th>Prix unitaire</th>
                            <th> Debit </th>
                            <th> Credit </th>
                           
                          </tr>
                        
                        <tbody>
                          <?php for ($i=0; $i < count($journal) ; $i++) { 
                            ?>
                              <tr>
                            <td><?= $journal[$i]['codejournal']?></td>
                            <td><?= $journal[$i]['dat']?></td>
                            <td><?= $journal[$i]['piece']?></td>
                            <td><?= $journal[$i]['numero']?></td>
                            <td><?= $journal[$i]['libelle']?></td>
                            <td><?= $journal[$i]['unite']?></td>
                            <td><?= $journal[$i]['quantite']?></td>
                            <td><?= $journal[$i]['prixunitaire']?></td>
                            <td><?= $journal[$i]['debit']?></td>
                            <td><?= $journal[$i]['credit']?></td> 
                          </tr>
                            <?php
                          }?>
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
    
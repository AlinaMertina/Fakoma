<style>
   .dropdown {
          position: relative;
          display: inline-block;
      }
  
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: none;
        color: white;
        min-width: 160px;
        /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
        z-index: 1;
        
      }
          
      .dropdown:hover .dropdown-content {
        display: block;
      }
      
      .dropdown-item {
        /* padding: 12px 16px; */
        text-decoration: none;
        display: block;
        margin-right: 20%;
        margin-left: -100%;
        background-color: #141514;
        color: white;
      }
  
      .dropdown-item:hover {
        background-color: #A6EBC9;
        
      }
     
</style>
        <!-- partial -->
        
        <div class="main-panel" style="background-color: white;">
            <div class="page-header">
                  <h3 class="page-title" style="color: black;margin-top:3%;margin-left:3%;">Journale</h3>
                  <nav aria-label="breadcrumb">
                    
                  <div class="dropdown" style="margin-top:3%;">
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
                <div class="card" >
                  <div class="card-body" style="background-color: #A6EBC9;" >  

 

                    <form action="<?php bu('CT_Gestion/insert_journal')?>" method="post" enctype="multipart/form-data">
  
                    <div class="table-responsive">

                        <table class="table" style="background-color: #A6EBC9;" >
                          <thead >
                            <tr>
                              <th style="color:black;" > Code </th>
                              <th style="color:black;" > Date </th>
                              <th style="color:black;" > Piece</th>
                              <th style="color:black;" ></th>
                              <th style="color:black;"> Compte</th>
                              <th style="color:black;"> Libellé </th>
                              <th style="color:black;"> Unite </th>
                              <th style="color:black;"> Quantite</th>
                              <th style="color:black;"> Prix unitaire</th>
                              <th style="color:black;"> Debit </th>
                              <th style="color:black;"> Credit </th>
                             
                            </tr>
                          </thead>
                          <tbody id="t_body">
                            <tr id="t_r"  style="background-color: white;">
                            <td  > 
                                <select class="form-control" name="codejournal[]">
                                    <?php for ($i=0; $i < count($codejournal); $i++) { 
                                       ?><option value="<?= $codejournal[$i]['id']?>"><?= $codejournal[$i]['code']?></option><?php
                                    }?>
                                </select></td>
                              <td> <input id="date" type="date" class="form-control" name="date[]" placeholder="date"> </td>
                              <td>
                                <select class="form-control" name="piecea[]">
                                <?php for ($i=0; $i < count($piece_prefix); $i++) { 
                                       ?><option value="<?= $piece_prefix[$i]?>"><?= $piece_prefix[$i]?></option><?php
                                    }?>
                                </select>
                                <td>
                                    <input id="nombre" type="text" class="form-control" name="pieceb[]"> 
                                </td>
                              </td>
                              <td> 
                                <select class="form-control" name="compte[]">
                                <?php for ($i=0; $i < count($compte); $i++) { 
                                       ?><option value="<?= $compte[$i]['id']?>"><?= $compte[$i]['numero']?></option><?php
                                    }?>
                                </select></td>
                              <td> <input id="libelle" type="text" class="form-control" name="libelle[]" placeholder="Descri">  </td>
                              <td> 
                                <select class="form-control" name="unite[]">
                                <?php for ($i=0; $i < count($unite); $i++) { 
                                       ?><option value="<?= $unite[$i]['id']?>"><?= $unite[$i]['unite']?></option><?php
                                    }?>
                                </select></td>
                              <td> <input id="debit" type="text" class="form-control" name="quantite[]" value="0">  </td>
                              <td> <input id="credit" type="text" class="form-control" name="prixunitaire[]" value="0"> </td>
                              <td> <input id="debit" type="text" class="form-control" name="debit[]" value="0">  </td>
                              <td> <input id="credit" type="text" class="form-control" name="credit[]" value="0"> </td>
                            </tr>
                          </tbody>
                        </table>  
                      <div class="ligne" style="margin-left: 950px;"><button type="button" class="btn btn-secondary" onclick="add()"><span class="mdi mdi-plus"></span></button>
                         <button type="submit" class="btn btn-success">Valider</button>
                      </div> 
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <script>
              function add(){
                t_r = document.getElementById('t_r')
                t_body = document.getElementById('t_body')
                t_body.appendChild(t_r.cloneNode(true))
              }
            </script>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
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
          input{
            background-color: #A6EBC9;
          }
     </style>
      <!-- partial -->
      <form action="<?php bu('CT_Gestion/insert_facture')?>" method="post" enctype="multipart/form-data">
      <div class="main-panel" style="background-color: white;width:112%">
            <div class="page-header">
                      <h3 class="page-title" style="color: black;margin-left:3%;display:flex;">Facture</h3>
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
        <div class="content-wrapper" style="background-color: white;width:100%">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card" style="background-color: #141514;">
                <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="<?= base_url("assets/logo.png")?>" alt="logo" style="width: 60px; height: 60px; margin-left: 150px; margin-top: 105px;" /></a> 
                <!-- <a class="sidebar-brand brand-logo" href="index.html"><img src="<?= base_url("assets/logo.png")?>" alt="logo" style="height: 20px; width: 100px; margin-left: 130px; margin-top: 25px;" /></a> -->
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card" style="background-color: #141514;">
                
                <div class="table-responsive" style="margin-top: 56px;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> Date </th>
                        <th>  <input id="date" type="date" class="form-control" name="date" placeholder="Date" value="<?= $date?>"> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        
                        <td>N° Facture</td>
                        <td>  <input id="facture" type="text" class="form-control" name="numero" value="<?= $numero?>"></td>
                      </tr>
                      <thead>
                        <tr>
                        
                          <th style="color: forestgreen;">  Client</th>
                          <th>  <select class="form-control" id="sel1" name="idclient">
                            <?php
                            for ($i=0; $i < count($client); $i++) { 
                               ?>
                               <option value="<?= $client[$i]['idclient']?>"><?= $client[$i]['nomclient']?></option>
                               <?php
                            }
                            ?>
                          </select> </th>
                        </tr>
                      </thead>
                      <tbody>
          
                        <tr>
                          <tr>
                            <th> Responsable :</th>
                            <th>  <input id="facture" type="text" class="form-control" name="nomresp">
                           </th>
                          </tr>
                        </tr>
                      </tbody>
                    
                    </tbody>
                  </table>
                </div>
              </div> 
           
            </div>
            </div>
          <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card" style="background-color: #141514;">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> Objet </th>
                          <th>  <input id="objet" type="text" class="form-control" name="objet" placeholder="objet"> </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          
                          <td> Reference</td>
                          <td>  <input id="reference" type="text" class="form-control" name="ref" placeholder="reference"></td>
                        </tr>
                      
                      </tbody>
                    </table>
                  </div>
                  <h4 class="card-title" style="text-align: center; color: darkolivegreen;">Insertion Facture</h4>
                  <div class="table-responsive" style="text-align: center;">
                    <table class="table">
                      <thead>
                        <tr style="font-size: 23px;">
                          <th> Designation </th>
                          <th> Unité </th>
                          <th> Nombre</th>
                          <th> PU </th>
                        </tr>
                      </thead>
                      <tbody id="t_body">
                        <tr id="t_r">
                          
                          <td> <input id="designation" type="text" class="form-control" name="designation[]"> </td>
                          <td>  <select class="form-control" name="unite[]">
                                <?php for ($i=0; $i < count($unite); $i++) { 
                                       ?><option value="<?= $unite[$i]['id']?>"><?= $unite[$i]['unite']?></option><?php
                                    }?>
                                </select>  </td>
                          <td><input id="nombre" type="text" class="form-control" name="nombre[]">  </td>
                          <td> <input id="pu" type="text" class="form-control" name="pu[]"> </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="ligne" style="margin-left: 950px;"><button type="button" class="btn btn-secondary" onclick="add()">Ajouter une ligne</button>
                      </div> 
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> Avance </th>
                          <th>  <input id="objet" type="text" class="form-control" name="avance" placeholder="objet"> </th>
                        </tr>
                      </thead>
                    
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card" style="background-color: #141514;">
               <div class="card-body">
               </div>
                <div class="ligne" style="">
                  <button type="submit" class="btn btn-success" style="float: right;">Valider</button>
               </div> 
              </div>
            </div>
          </div>
</form>

                    <div class="table-responsive" style="background-color: #141514; margin-top:2%;">
                      <form action="<?php  bu('CT_Gestion/see_facture')?>" method="get">
                        <table class="table" style="background-color: #141514;">
                          
                          <tbody>
                            <tr>
                                <td>Numero</td>
                             
                                <td>
                                    <select class="form-control" id="sel1" name="id">
                                        <?php 
                                        for ($i=0; $i < count($list); $i++) { 
                                            ?>
                                            <option value="<?= $list[$i]['id']?>"><?= $list[$i]['numero']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                               </td> 
                               <td><button type="submit" class="btn btn-success">Voir</button></td>
                            </tr>
                          </tbody>
                        </table>  
                        </form>
                    </div>
            
     
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script>
              function add(){
                t_r = document.getElementById('t_r')
                t_body = document.getElementById('t_body')
                t_body.appendChild(t_r.cloneNode(true))
              }
            </script>
<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">

<div class="main-panel">
  <div class="content-wrapper">
    
    <div class="page-header">
      <h3 class="page-title">Client</h3>
      <nav aria-label="breadcrumb">

        <div class="dropdown">
          <span class="mdi mdi-format-list-bulleted dropdown-item"></span>
          <div class="dropdown-content">
          </div>
        </div>

      </nav>
    </div>

    <form action="<?php bu('CT_Gestion/insert_facture')?>" method="post" enctype="multipart/form-data">

      <div class="row">
        
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="template/assets/images/logo-mini.svg" alt="logo" style="width: 60px; height: 60px; margin-left: 150px; margin-top: 105px;" /></a> 
            <a class="sidebar-brand brand-logo" href="index.html"><img src="template/assets/images/logo.svg" alt="logo" style="height: 20px; width: 100px; margin-left: 130px; margin-top: 25px;" /></a>
          </div>
        </div>

        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
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

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
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

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-12 grid-margin">
          <div class="card">
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
          <div class="card">
            <div class="card-body">
            </div>
            <div class="ligne" style="">
              <button type="submit" class="btn btn-success">Valider</button>
            </div> 
          </div>
        </div>
      </div>

    </form>

    <div class="table-responsive">
      <form action="<?php  bu('CT_Gestion/see_facture')?>" method="get">
        <table class="table">
          
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
</div>

<script>
  function add(){
    t_r = document.getElementById('t_r')
    t_body = document.getElementById('t_body')
    t_body.appendChild(t_r.cloneNode(true))
  }
</script>
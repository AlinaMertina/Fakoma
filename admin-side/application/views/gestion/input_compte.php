<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Plan Comptable</h3>
      <nav aria-label="breadcrumb">

          <div class="dropdown">
              <span class="mdi mdi-format-list-bulleted dropdown-item"></span>
              <div class="dropdown-content">
              </div>
          </div>

      </nav>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

          <form action="<?php bu('CT_Gestion/insert_compte')?>" method="post" >
            <h6 style="margin-left: 3px; color:gray;"> Ajout code :
            <input id="credit" type="text" class="form-control" name="numero"> 
            </h6>
            <h6 style="margin-left: 3px; color: gray;"> Intitulé :
                <input id="credit" type="text" class="form-control" name="intitule">
            </h6>
            <div class="ligne" style="margin-left: 1100px;">
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
          </form>
                    
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr style="font-size: 25px;">
                  <th></th>
                  <th> Code  </th>
                  <th> Intitulé </th>
                  
                  
                </tr>
              </thead>
              <tbody>
                <?php 
                for ($i=0; $i < count($compte); $i++) { 
                    ?>
                      <tr>
                  <td>
                    <div class="form-check form-check-muted m-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td> <?= $compte[$i]['numero']?> </td>
                  <td> <?= $compte[$i]['intitule']?> </td>
                  
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

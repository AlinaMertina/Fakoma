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

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
 
          <form action="<?php bu('CT_Gestion/insert_client')?>" method="post" >
            <h6 style="margin-left: 3px; color:gray;"> Nom
            <input id="credit" type="text" class="form-control" name="nom"> 
            </h6>
            <h6 style="margin-left: 3px; color: gray;"> Adresse :
                <input id="credit" type="text" class="form-control" name="adresse">
            </h6>
            <h6 style="margin-left: 3px; color: gray;"> Mail :
                <input id="credit" type="text" class="form-control" name="mail">
            </h6>
            <h6 style="margin-left: 3px; color: gray;"> Tel :
                <input id="credit" type="text" class="form-control" name="tel">
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
                  <th> Nom  </th>
                  <th> Adresse </th>
                  <th>Mail</th>
                  <th>Tel</th>
                  
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

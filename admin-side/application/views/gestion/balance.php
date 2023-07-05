
<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Balance</h3>
      <nav aria-label="breadcrumb">

          <div class="dropdown">
              <span class="mdi mdi-format-list-bulleted dropdown-item"></span>
              <div class="dropdown-content">
              </div>
          </div>

      </nav>
    </div>
    <div class="row ">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
            
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr style="font-size: 25px;">
                    <th></th>
                    <th> Compte </th>
                    <th> Intitulé</th>
                    <th> Mouvement</th>
                    <th>  </th>
                    <th> Solde </th>
                    <th> </th>
                    
                  </tr>
                </thead>
                <thead>
                    <tr style="font-size: 25px;">
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Debit</th>
                      <th>Credit</th>
                      <th>Debit</th>
                      <th>Credit</th>
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
                          <input type="checkbox" class="form-check-input">
                        </label>
                      </div>
                    </td>
                    <td> <?= $balance['liste'][$i]['numero']?> </td>
                    <td> <?= $balance['liste'][$i]['intitulecompte']?> </td>
                    <td> <?= $balance['liste'][$i]['debit']?> </td>
                    <td> <?= $balance['liste'][$i]['credit']?> </td>
                    <?php if($balance['liste'][$i]['solde']<0){
                      ?>
                      <td>0 </td>
                      <td> <?= -$balance['liste'][$i]['solde']?> </td>
                      <?php

                          }
                          else {
                            ?>
                            
                      <td> <?= -$balance['liste'][$i]['solde']?> </td>
                      <td>0 </td>
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
                          <input type="checkbox" class="form-check-input">
                        </label>
                      </div>
                    </td>
                    <td style="font-size: 25px;"> TOTAL </td>
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
</div>
   
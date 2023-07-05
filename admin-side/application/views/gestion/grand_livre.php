<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Grand Livre</h3>
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

          <div class="table-responsive">
            <form action="<?php  bu('CT_Gestion/grand_livre')?>" method="get">
              <table class="table">
                
                <tbody>
                  <tr>
                      <td>Compte</td>
                    
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
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr style="font-size: 25px;">
                  <th></th>
                  <th>Code journal</th>
                  <th> Date </th>
                  <th> Piece</th>
                  <th> Libellé </th>
                  <th> Debit </th>
                  <th> Credit </th>
                  
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
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td> <?= $grandlivre['liste'][$i]['codejournal']?> </td>
                  <td> <?= $grandlivre['liste'][$i]['dat']?> </td>
                  <td> <?= $grandlivre['liste'][$i]['piece']?> </td>
                  <td>  <?= $grandlivre['liste'][$i]['libelle']?> </td>
                  <td> <?= $grandlivre['liste'][$i]['debit']?> </td>
                  <td> <?= $grandlivre['liste'][$i] ['credit']?> </td>
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
                  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td> Total </td>
                  <td> <?= $grandlivre['total']['debit']?> </td>
                  <td> <?= $grandlivre['total']['credit']?></td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>

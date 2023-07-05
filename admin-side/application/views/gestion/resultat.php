<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">

<div class="main-panel">
  <div class="content-wrapper">
    
    <div class="page-header">
      <h3 class="page-title">Résultat</h3>
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
            <table class="table">
              <thead>
                  <tr style="font-size: 25px;">
                      <th></th>
                      <th>Actif</th>
                      <th> </th>
                      <th> Passif</th>
                      <th> </th>
                  </tr>
              </thead>
              <thead>
                  <tr style="font-size: 25px;">
                      <th></th>
                      <th>Compte</th>
                      <th>Montant</th>
                      <th>Compte</th>
                      <th>Montant</th>
                  </tr>
              </thead>
              <tbody>

              <?php 
              for ($i=0; $i < count($resultat['charges']); $i++) { 
                  ?>
                  <tr>
                  <td>
                    <div class="form-check form-check-muted m-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td> <?= $resultat['charges'][$i]['numero']?> </td>
                  <td> <?= $resultat['charges'][$i]['debit']?> </td>
                  <td> <?= $resultat['produits'][$i]['numero']?></td>
                  <td> <?= $resultat['produits'][$i]['credit']?></td>
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
                  <td>Total</td>
                  <td><?= $resultat['total'][0]?></td>
                  <td>Total</td>
                  <td><?= $resultat['total'][1]?></td> 
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
                  <?php if ($resultat['total'][2]<0) {
                      ?>
                      <td style="font-size: 25px;"> Perte </td>
                  <td style="font-size: 25px; color: chartreuse;"> <?= -$resultat['total'][2]?>  </td>
                      <?php
                  }
                  else {
                    ?>
                    <td style="font-size: 25px;"> Bénéfice </td>
                  <td style="font-size: 25px; color: chartreuse;"> <?= $resultat['total'][2]?> </td>
                    <?php
                  }?>
                  
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
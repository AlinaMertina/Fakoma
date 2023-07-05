<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">

<div class="main-panel">
  <div class="content-wrapper">
    
    <div class="page-header">
      <h3 class="page-title">Liste Journal</h3>
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
          <form action="<?php bu('CT_Gestion/list_journal')?>" method="get" enctype="multipart/form-data">
            <h6 style="margin-left: 3px; color:gray;"> Code journal :
            <select class="form-control" id="sel1" name="codejournal">
              <?php for ($i=0; $i < count($codejournal); $i++) { 
                  ?><option value="<?= $codejournal[$i]['id']?>"><?= $codejournal[$i]['code']?></option><?php
              }?> 
            </select> 
            </h6>
            <h6 style="margin-left: 3px; color:gray;"> Année :
                <select class="form-control" id="sel1" name="year">
                    <option value="2023">2023</option>
                </select> 
            </h6>
            <h6 style="margin-left: 3px; color: gray;"> Mois :
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
            </h6>
            <div class="ligne" style="">
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
          </form>
                    
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr style="font-size: 25px;">
                  <th>Code journal</th>
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
              </thead>
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
</div>


          
    
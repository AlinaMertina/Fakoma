<link rel="stylesheet" href="<?= base_url("assets/produit/css/insertion.css"); ?>">

<div class="main-panel">
  <div class="content-wrapper">
    
    <div class="page-header">
      <h3 class="page-title">Entrée  Journal</h3>
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
          <form action="<?php bu('CT_Gestion/insert_journal')?>" method="post" enctype="multipart/form-data">
          
            <div class="table-responsive">

              <table class="table">
                <thead >
                  <tr>
                    <th> Code </th>
                    <th> Date </th>
                    <th> Piece</th>
                    <th></th>
                    <th> Compte</th>
                    <th> Libellé </th>
                    <th> Unite </th>
                    <th> Quantite</th>
                    <th> Prix unitaire</th>
                    <th> Debit </th>
                    <th> Credit </th>
                  
                  </tr>
                </thead>
                <tbody id="t_body">
                  <tr id="t_r">
                  <td> 
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
                            ?><option value="<?= $compte[$i]['id']?>"><?= $compte[$i]['numero']?> (<?= $compte[$i]['intitule']?>)</option><?php
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
              <div class="ligne" style="margin-left: 950px;">
                <button type="button" class="btn btn-secondary" onclick="add()">Ajouter une ligne</button>
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
    
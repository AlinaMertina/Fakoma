<style>
.dropdown {
  position: relative;
  display: inline-block;
}
#validation{
        float:right;
        background-color: #61FF7E;
      }
.dropbtn {
  background-color: red;
  padding: 10px;
}

.dropdown-content {
  display: none;
  position: absolute;
}

.dropdown:hover .dropdown-content {
  display:block;
}
table{
  font-size: 16px;
}
.main{
  font-size: 16px;
  background-color: white;
}
.valider{
  float: right;
  border: 1px;
}
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
<?php if(!isset($exit)) $exit=array(); ?>
<?php if(!isset($xt)) $xt=array(); ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Sortie de stock </h3>
                <div class="dropdown">
                    <span class="mdi mdi-format-list-bulleted dropdown-item"></span>
                    <div class="dropdown-content">
                        <a class="dropdown-item" href="<?= base_url("index.php/CT_Stock_Produit/inventory") ?>">Stock </a>
                        <a class="dropdown-item" href="<?= base_url("index.php/CT_Stock_Produit/StockEntry") ?>">Entrer de Stock </a>
                        <a class="dropdown-item" href="<?= base_url("index.php/CT_Stock_Produit/StockEXIT") ?>">Sortie de Stock</a>
                    </div>
                </div>
            </div>

            <!--body of content -->
            <div class="row">
                <!-- Formulaire de choix de GDlivre -->
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Formulaire de sélection</h4>
                            <p class="card-description"> Sélect xt & date </p>
                            <form class="form-sample" action="<?= bu('CT_Stock_Produit/StockEXIT1/');?>" method="get">

                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date de sortie:</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="dateXT" class="form-control" id="exampleInputUsername2" placeholder="Date selectionné">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Produit sortie:</label>
                                    <div class="col-sm-9">
                                        <select name="xt" class="form-control" >
                                            <?php for ($i=0; $i<count($xt); $i++) { ?>
                                                <option value="<?= $xt[$i]->idproduit; ?>"><?= $xt[$i]->nomproduit; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Balance -->
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Historique</h4>
                            <p class="card-description"> histS <code>.Société</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th> Nom Produit</th>
                                        <th> date Sortie xt finis </th>
                                        <th> quantité de xt finis </th>
                                        <th> clients</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php for ($i =0;$i <count($exit) ;$i++) { ?>
                                        <tr>
                                            <td><?= $exit[$i]->idproduit; ?></td>
                                            <td><?= $exit[$i]->nomproduit; ?></td>
                                            <td><?= $exit[$i]->datesortieproduit; ?></td>
                                            <td><?= $exit[$i]->quantiteproduit; ?></td>
                                            <td><?= $exit[$i]->nomclient; ?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
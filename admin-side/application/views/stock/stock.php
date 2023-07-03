<link rel="stylesheet" href="<?= base_url("assets/css_perso/fanampiny.css") ?>">
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
<?php if(!isset($inventory)) $inventory=array(); ?>
<?php if(!isset($xt)) $xt=array(); ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Inventaire de stock </h3>
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
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" >Formulaire de sélection</h4>
                            <p class="card-description"></p>
                            <form class="form-inline" action="<?= bu('CT_Stock_Produit/inventory1/');?>" method="get">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">XT</div>
                                    </div>
                                    <select name="xt" class="form-control" >
                                        <?php for ($i=0; $i<count($xt); $i++) { ?>
                                        <option value="<?= $xt[$i]->idproduit; ?>"><?= $xt[$i]->nomproduit; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">sélectionné</button>
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
                            <h4 class="card-title">INVENTAIRE</h4>
                            <p class="card-description"> Invent <code>.Société</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th> Nom Produit</th>
                                        <th> Stock initial </th>
                                        <th> Stock restant </th>
                                        <th> date fin Reste</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php for ($i =0;$i <count($inventory) ;$i++) { ?>
                                    <tr>
                                        <td><?= $inventory[$i]->idproduit; ?></td>
                                        <td><?= $inventory[$i]->nomproduit; ?></td>
                                        <td><?= $inventory[$i]->stock_initial; ?></td>
                                        <td><?= $inventory[$i]->stock_restant; ?></td>
                                        <td><?= $inventory[$i]->datereste; ?></td>
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
        
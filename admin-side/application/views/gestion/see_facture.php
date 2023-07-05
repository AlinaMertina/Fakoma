
<div class="main-panel">
  <div class="content-wrapper">
    
    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Nom :</th>
                  <th style="font-size: 14px; color: gray;"> <?= $facture['facture']['nomclient']?> </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <tr>
                    <th> Tel :</th>
                    <th style="font-size: 14px; color: gray;">  <?= $facture['facture']['tel']?> </th>
                  </tr>
                </tr>
                <tr>
                  <tr>
                    <th> Email :</th>
                    <th style="font-size: 14px; color: gray;"> <?= $facture['facture']['mail']?> </th>
                  </tr>
                </tr>
                <tr>
                  <tr>
                    <th> Nom du responsable :</th>
                    <th style="font-size: 14px; color: gray;">  <?= $facture['facture']['nomresp']?> </th>
                  </tr>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="template/assets/images/logo-mini.svg" alt="logo" style="width: 80px; height: 80px; margin-left: 660px; margin-top: 35px;" /></a> 
          <div class="table-responsive" style="margin-top: 56px;">
            <table class="table">
              <thead style="text-align: center;">
                <tr>
                  <th> Date </th>
                  <th style="font-size: 14px; color: gray;">  <?= $facture['facture']['dat']?> </th>
                </tr>
              </thead>
              <tbody style="text-align: center;">
                <tr>
                  
                  <td>N° Facture</td>
                  <td style="font-size: 14px; color: gray;">   <?= $facture['facture']['numero']?> </td>
                </tr>
              
              </tbody>
            </table>
          </div>
        </div>   
      </div>
    </div>

    <div class="row ">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" style="text-align: center;">
                <thead>
                  <tr>
                    <th> Objet </th>
                    <th style="font-size: 14px; color: gray;">   <?= $facture['facture']['objet']?> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                    <td> Reference</td>
                    <td style="font-size: 14px; color: gray;">   <?= $facture['facture']['ref']?></td>
                  </tr>
                
                </tbody>
              </table>
            </div>
            
            <div class="table-responsive" style="text-align: center; margin-top: 20px;">
                <h4 class="card-title" style="text-align: center; color: darkolivegreen;">Insertion Facture</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th> Designation </th>
                    <th> Unité </th>
                    <th> Nombre</th>
                    <th> PU </th>
                    <th> Montant </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  for ($i=0; $i < count($facture['details']); $i++) { 
                    ?>
                    <tr style="font-size: 14px; color: gray;"> 
                    <td> <?= $facture['details'][$i]['libelle']?> </td>
                    <td> <?= $facture['details'][$i]['unite']?></td>
                    <td><?= $facture['details'][$i]['quantite']?> </td>
                    <td> <?= $facture['details'][$i]['prixunitaire']?> </td>
                    <td> <?= $facture['details'][$i]['credit']?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  
                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> Montant</td>
                    <td style="font-size: 14px; color: gray;">  <?= $facture['facture']['ht']?></td>
                
                  </tr>
                  <tr>
                    <td>  </td>
                    <td>  </td>
                    <td>  </td>
                    <td> TVA 20% </td>
                    <td style="font-size: 14px; color: gray;">   <?= $facture['facture']['ht']*20/100?></td>
                  </tr>
                  <tr>
                    <td>  </td>
                    <td> </td>
                    <td>  </td>
                    <td> TTC </td>
                    <td style="font-size: 14px; color: gray;"> <?= $facture['facture']['ttc']?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Avance</td>
                    <td style="font-size: 14px; color: gray;">  <?= $facture['facture']['avance']?> </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> NET a payer</td>
                    <td style="font-size: 14px; color: black; background-color: wheat;">  <?= $facture['facture']['net']?></td>
                  </tr>
                </tbody>
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
            <h6 class="card-title" style="color: gray;"><p style="text-align: center;">Facture arrete a la somme de    :      <a style="font-size: 22px;" > <?php

            echo (new NumberFormatter("fr",NumberFormatter::SPELLOUT))->format($facture['facture']['ttc']);
            ?> Ariary</a>  </p></h6> 
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="<?php bu('CT_Gestion/export_facture')?>" method="get">
              <input type="hidden" name="id" value="<?= $facture['facture']['id']?>">
              <div class="ligne" style="margin-left: 1100px; padding-bottom: 23px;">
                <button type="submit" class="btn btn-success">Imprimer</button>
              </div> 
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div id="main_panel main" style="background-color: white;width:80%;height:60%;margin:5%;">
<table class="table">
    <div style="float:right;">
            <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $idemployer; ?>" style="background-color: #101B3B;" class="btn btn-primary">Retour</a>
     </div>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Faute</th>
      <th scope="col">Date de faute</th>
    </tr>
  </thead>
  <tbody>
    <?php  if($faute){ 
        for($i=0;$i<count($faute);$i++) { ?>
    <tr>
      <th scope="row">1</th>
      <td><?= $faute[$i]['description']; ?></td>
      <td><?= $faute[$i]['dateavertisement']; ?></td>
      
    </tr>
    <?php }
    } ?>
  </tbody>
</table>
</div>
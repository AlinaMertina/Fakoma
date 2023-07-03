<div id="main_panel main">
<ul>
    <?php if(isset($emplois_du_temps)){ for($i=0;$i<count($emplois_du_temps);$i++){ ?>
        <li><?=  $emplois_du_temps[$i]['prenom_employer']?></li>

    <?php } }  ?>
</ul>
</div>
</div>
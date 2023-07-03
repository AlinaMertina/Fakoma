
<style>
    
    #main_panel{
        border-radius: 5px;
    }
    #corps{
        background-color: white;
        margin: 5%;
        margin-left: 10%;
        padding: 5%;
        color: black;
        border-radius: 5px;
        font-size: 15px;
    }
    input{
        background-color: white;
    }
    .inputm{
        margin-bottom: 5%;
    }
    #sub{
        width: 50%;
        background-color: aqua;
    }
    input{
        color: white;
    }
    #formGroupExampleInput{
        color: white;
    }
    #formGroupExampleInput2{
        color: white;
    }
    /* .custom-height {
        height: 100px; 
    }
    */
    i{
        color: black;
    }
    .search{
        float: right;
        width: 50%;
    }
    .inpte_search{
        background-color: white;
        color: white;
    }
</style>
<div id="main_panel main" style="background-color: white;width:70%;margin:3%;margin-left:12%;">
<div id="corps" >

    <form action="<?= base_url("index.php/CT_CRUD_Employer/getfauteemployer")?>">
    <div class="row g-3 search">
        <div class="col">
            <input type="text" style="color: white;" class="form-control inpte_search" placeholder="mot cle" aria-label="First name" name="faute">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Go</button>
        </div>
</div>
    </form>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Identifiant</th>
        <th scope="col">Nom</th>
        <th scope="col">Post</th>
        <th scope="col">Faute</th>
        </tr>
    </thead>
    <tbody>
 
        <?php if(isset($faute)) { 
            foreach ($faute as $fauteperso) {
                ?>
        <tr>
            <th scope="row"><?= $fauteperso['idavertisment']?></th>
            <td><?= $fauteperso['identifiant'] ?></td>
            <td><?= $fauteperso['prenom_employer'] ?></td>
            <td><?= $fauteperso['nom_poste'] ?></td>
            <td><?= $fauteperso['description'] ?></td>
        </tr>
        <?php } 
     }?>
        
    </tbody>
    </table>
</div>
</div>
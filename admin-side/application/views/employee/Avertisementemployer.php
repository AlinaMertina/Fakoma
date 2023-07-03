<style>
    
    #main_panel{
        border-radius: 5px;
    }
    form{
        background-color: white;
        margin: 5%;
        margin-left: 10%;
        padding: 5%;
        color: black;
        border-radius: 5px;
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

</style>
<link href="<?= base_url("assets/css_perso/avertisement.css")?>" rel="shylesheet">

<div id="main_panel main" style="background-color: white;width:70%;margin:3%;border-radius: 30px;margin-left:12%;">
        <div style="float:right;">
            <a href="<?php if(isset($idemployer)){  echo base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $idemployer;  } ?>" style="background-color: #101B3B;" class="btn btn-primary">Retour</a>
        </div>
    <form action="<?= base_url("index.php/CT_CRUD_Employer/setAvertissement"); ?>" method="post" >
    
            <div class="inputm a0">
                <label for="formGroupExampleInput" class="form-label">Identifiant</label>
                <input type="text" class="form-control" id="formGroupExampleInput" id="num"  oninput="afficherListe()" name="identifiant" value="<?php if(isset($idemployer)){ echo $idemployer; }?>" required> 
                <select id="maliste" style="display: none;" onchange="identifiant()"></select>
            </div>
            <div class="inputm">
                <label for="formGroupExampleInput2" class="form-label">Description faute</label>
                <input type="text" class="form-control custom-height" id="formGroupExampleInput2" name="description"  style="white-space: pre-wrap; overflow-wrap: break-word; word-wrap: break-word;" wrap="hard">
            </div>
            <div class="inputm">
                <label for="formGroupExampleInput2" class="form-label">Date</label>
                <input type="date" class="form-control" id="formGroupExampleInput2" name="date">
            </div>
            <div class="inputm">
                <input type="submit"  id="sub" value="OK">
            </div>

    </form>

</div>
<script>
    function afficherListe() {
   
    var nombre =document.getElementById("formGroupExampleInput").value;
    var selectCgenerale = document.getElementById("maliste");
    selectCgenerale.innerHTML="";
    if (nombre.length > 0) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // La réponse a été reçue avec succès
                var response = JSON.parse(this.responseText);
                const optionElement = document.createElement('option');
                selectCgenerale.append(optionElement);
                for(const element of response){
                    const optionElement = document.createElement('option');
                    if(element.identifiant.startsWith(nombre)){
                        optionElement.value = element.identifiant;
                        optionElement.text = element.identifiant+" "+element.nom_employer;
                        selectCgenerale.append(optionElement);
                    } 
                }
            }
        };
        xhttp.open("GET", "<?= base_url('/index.php/CT_CRUD_Employer/liste_emp_ajax'); ?>", true);
        xhttp.send();
        selectCgenerale.style.display = "block";
    } else {
      selectCgenerale.style.display = "none";
    }
}
    function identifiant(){
    var nombre = document.getElementById("formGroupExampleInput");
    var selectCgenerale = document.getElementById("maliste");
        nombre.innerHTML="";
        console.log(selectCgenerale.value);
        nombre.value=selectCgenerale.value;
        nombre.placeholder=selectCgenerale.value;
        selectCgenerale.style.display = "none";
        selectCgenerale.innerHTML="";
    }
</script>
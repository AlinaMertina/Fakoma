<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Update employee salary </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <form class="card-body" action="<?= base_url("/index.php/CT_CRUD_Employer/insert_modif_salaire_employer"); ?>" method="post">

                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label">Identifiant</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" id="num" oninput="afficherListe()" name="identemp" required>
                            <select id="maliste" style="display: none;" onchange="identifiant()"></select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2" class="form-label">Salaire</label>
                            <input type="numbre" class="form-control" id="formGroupExampleInput2" name="salaire">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2" class="form-label">Date</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="date">
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn btn-primary" value="Valider">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function afficherListe() {

        var nombre = document.getElementById("formGroupExampleInput").value;
        var selectCgenerale = document.getElementById("maliste");
        selectCgenerale.innerHTML = "";
        if (nombre.length > 0) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // La réponse a été reçue avec succès
                    var response = JSON.parse(this.responseText);
                    const optionElement = document.createElement('option');
                    selectCgenerale.append(optionElement);
                    for (const element of response) {
                        const optionElement = document.createElement('option');
                        if (element.identifiant.startsWith(nombre)) {
                            optionElement.value = element.identifiant;
                            optionElement.text = element.identifiant + " " + element.nom_employer;
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

    function identifiant() {
        var nombre = document.getElementById("formGroupExampleInput");
        var selectCgenerale = document.getElementById("maliste");
        nombre.innerHTML = "";
        console.log(selectCgenerale.value);
        nombre.value = selectCgenerale.value;
        nombre.placeholder = selectCgenerale.value;
        selectCgenerale.style.display = "none";
        selectCgenerale.innerHTML = "";
    }
</script>
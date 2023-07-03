<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">Presence count</div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <canvas id="myChart" width="400" height="200"></canvas>
                    <div id="liste_employer">
                        <form class="card-body" action="<?= base_url("/index.php/CT_CRUD_Employer/liste_employe_present?date=$date"); ?>" method="GET">
                            <input type='hidden' name="date" id="date" value=''>
                            <input type='hidden' name="nomsemaine" id="nomsemaine" value=''>
                            <input type="submit" value="OK" style="display:none;color:aqua;" id="OK">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // <block:setup:1>
    const labels = <?= $label; ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: ' Employee Present',
            data: <?= $nombre; ?>,
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgb(75, 192, 192)'
            ],
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            onClick: function(event, elements) {
                if (elements.length > 0) {
                    // Un élément a été cliqué
                    var index = elements[0].index;
                    var label = data.labels[index];
                    var value = data.datasets[0].data[index];
                    console.log('Clicked on', label, 'with value', value);
                    var date = <?php echo  $date; ?>;
                    console.log(<?php echo  $date; ?>);
                    var dateform = document.getElementById('date');
                    dateform.value = date;
                    var nomsemaine = document.getElementById('nomsemaine');
                    nomsemaine.value = label;
                    var ok = document.getElementById('OK');
                    ok.style = "display:block;"


                    // var xhttp = new XMLHttpRequest();
                    // xhttp.onreadystatechange = function() {if (this.readyState == 4 && this.status == 200) {}};
                    // xhttp.open("GET", "<?= base_url("/index.php/CT_CRUD_Employer/liste_employe_present?date=$date&&nomsemaine="); ?>"+label, true);
                    // xhttp.send();
                }
            }
        },
    };
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, config);
</script>
<div id="main_panel main" style="background-color: white;width:80%;height:60%;margin:5%;">
<style>
    #myChart{
        width:70%;
        height: 50px;
    }
</style>
        <div style="float:right;">
            <a href="<?= base_url("index.php/CT_CRUD_Employer/detaille") . "/" . $idemployer; ?>" style="background-color: #101B3B;" class="btn btn-primary">Retour</a>
        </div>
<canvas id="myChart" width="400" height="150"></canvas>
        
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // <block:setup:1>
    const labels = <?= $label;?>;
    const data = {
    labels: labels,
    datasets: [{
        label: 'Moyenne Salaire',
        data:  <?= $salaire;?>,
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
                }
            },
        };
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, config);
</script>
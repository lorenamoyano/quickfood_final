@extends('layouts.app')

@section('content')
<div id="container" class="mx-auto" style="width: 75%;" class="chartjs">
    <canvas id="pie-chart"></canvas>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(function() {
        //get the pie chart canvas
        var cData = JSON.parse('<?php echo $chart_data; ?>');
        var ctx = $("#pie-chart");

        //pie chart data
        var data = {
            labels: cData.label,
            datasets: [{
                label: "Compras",
                data: cData.data,
                backgroundColor: [
                    "#DEB887",
                    "#A9A9A9",
                    "#DC143C",
                    "#F4A460",
                    "#2E8B57",
                    "#1D7A46",
                    "#CDA776",
                ],
                borderColor: [
                    "#CDA776",
                    "#989898",
                    "#CB252B",
                    "#E39371",
                    "#1D7A46",
                    "#F4A460",
                    "#CDA776",
                ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1]
            }]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Usuarios que más han comprado",
                fontSize: 18,
                fontColor: "#111"
            },
        };

        //create Pie Chart class object
        var chart1 = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options
        });

    });
</script>
@endsection
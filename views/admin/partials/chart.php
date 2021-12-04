<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css">
<style>
.animsition {
    opacity: 1;
}

.highcharts-credits {
    opacity: 0;
}

g.highcharts-legend.highcharts-no-tooltip {
    opacity: 0;
}
</style>
<section class="statistic-chart">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">statistics</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <!-- CHART-->
                <div id="chart1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <!-- END CHART-->
            </div>
            <div class="col-md-6 col-lg-6">
                <!-- TOP CAMPAIGN-->
                <div class="top-campaign">
                    <h3 class="title-3 m-b-30">top campaigns</h3>
                    <div class="table-responsive">
                        <table class="table table-top-campaign">
                            <tbody>
                                <tr>
                                    <td>1. Australia</td>
                                    <td>$70,261.65</td>
                                </tr>
                                <tr>
                                    <td>2. United Kingdom</td>
                                    <td>$46,399.22</td>
                                </tr>
                                <tr>
                                    <td>3. Turkey</td>
                                    <td>$35,364.90</td>
                                </tr>
                                <tr>
                                    <td>4. Germany</td>
                                    <td>$20,366.96</td>
                                </tr>
                                <tr>
                                    <td>5. France</td>
                                    <td>$10,366.96</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END TOP CAMPAIGN-->
            </div>

        </div>
    </div>
</section>
<?php 
require_once('../models/ChartOrderModel.php');
$order = new ChartOrderModel();
$orderByMonth = [];
for ($i=1; $i <=12 ; $i++) { 
    array_push($orderByMonth,count($order->getAllOrderByMonth($i)));
}

// var_dump($orderByMonth);die;
    $a = [1.2,3.4,3.2,2.1,3.6,7.8,3.1,7.6,3.2,4.5,6.8];
?>
<script>
$(function() {
    Highcharts.chart('chart1', {
        title: {
            text: 'Chart Order By Month',
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ]
        },
        yAxis: {
            title: {
                text: 'The Number Of Products'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        // tooltip: {
        //     valueSuffix: '°C'
        // },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            data: [<?php 
                foreach ($orderByMonth as $value) {
                   echo $value.',';
                } 
                ?>]
        }]
    });
});
</script>
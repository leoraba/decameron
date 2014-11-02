<!-- Morris Charts CSS -->
<link href="css/plugins/morris.css" rel="stylesheet">


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Estad&iacute;sticas
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home">
                </i>
                 <a href='?m=home'>
                 Inicio</a>
            </li>
            <li class="active">
                <i class="fa fa-bar-chart-o">
                </i>
                 Estad&iacute;sticas
            </li>
        </ol>
    </div>
</div>


<!-- contenido -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Pais de origen</h3>
            </div>
            <div class="panel-body">
                <div id="morris-bar-chart"></div>
                <div class="text-right">
                    <a href="#">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Rango de edad</h3>
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
                <div class="text-right">
                    <a href="#">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="panel panel-red">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Historial de visitas en el hotel</h3>
        </div>
        <div class="panel-body">
            <div id="morris-line-chart"></div>
            <div class="text-right">
                <a href="#">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script style="text/javascript" language"JavaScript">
$( document ).ready(function() {
// Line Chart
    Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'morris-line-chart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [{
            d: '2014-10-01',
            visitas: 802
        }, {
            d: '2014-10-02',
            visitas: 783
        }, {
            d: '2014-10-03',
            visitas: 820
        }, {
            d: '2014-10-04',
            visitas: 839
        }, {
            d: '2014-10-05',
            visitas: 792
        }, {
            d: '2014-10-06',
            visitas: 859
        }, {
            d: '2014-10-07',
            visitas: 790
        }, {
            d: '2014-10-08',
            visitas: 1680
        }, {
            d: '2014-10-09',
            visitas: 1592
        }, {
            d: '2014-10-10',
            visitas: 1420
        }, {
            d: '2014-10-11',
            visitas: 882
        }, {
            d: '2014-10-12',
            visitas: 889
        }, {
            d: '2014-10-13',
            visitas: 819
        }, {
            d: '2014-10-14',
            visitas: 849
        }, {
            d: '2014-10-15',
            visitas: 870
        }, {
            d: '2014-10-16',
            visitas: 1063
        }, {
            d: '2014-10-17',
            visitas: 1192
        }, {
            d: '2014-10-18',
            visitas: 1224
        }, {
            d: '2014-10-19',
            visitas: 1329
        }, {
            d: '2014-10-20',
            visitas: 1329
        }, {
            d: '2014-10-21',
            visitas: 1239
        }, {
            d: '2014-10-22',
            visitas: 1190
        }, {
            d: '2014-10-23',
            visitas: 1312
        }, {
            d: '2014-10-24',
            visitas: 1293
        }, {
            d: '2014-10-25',
            visitas: 1283
        }, {
            d: '2014-10-26',
            visitas: 1248
        }, {
            d: '2014-10-27',
            visitas: 1323
        }, {
            d: '2014-10-28',
            visitas: 1390
        }, {
            d: '2014-10-29',
            visitas: 1420
        }, {
            d: '2014-10-30',
            visitas: 1529
        }, {
            d: '2014-10-31',
            visitas: 1892
        }, ],
        // The name of the data record attribute that contains x-visitass.
        xkey: 'd',
        // A list of names of data record attributes that contain y-visitass.
        ykeys: ['visitas'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['visitas'],
        // Disables line smoothing
        smooth: false,
        resize: true
    });

    // Bar Chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            device: 'Guatemala',
            geekbench: 136
        }, {
            device: 'Honduras',
            geekbench: 137
        }, {
            device: 'Australia',
            geekbench: 275
        }, {
            device: 'Colombia',
            geekbench: 380
        }, {
            device: 'Estados unidos',
            geekbench: 655
        }, {
            device: 'El Salvador',
            geekbench: 1571
        }],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Geekbench'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        resize: true
    });

     // Donut Chart
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "0-12 años",
            value: 12
        }, {
            label: "13-18 años",
            value: 30
        }, {
            label: "19-30 años",
            value: 40
        }, {
            label: "31-50 años",
            value: 30
        }, {
            label: "51 años o más",
            value: 20
        }],
        resize: true
    });
});
</script>
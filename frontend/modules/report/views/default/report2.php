<?php

use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\HighchartsAsset;
HighchartsAsset::register($this)->withScripts(['modules/exporting', 'modules/drilldown']);

$this->title = 'รายงานแจ้งซ่อม';
$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['/report/default/index']];
$this->params['breadcrumbs'][] = 'รายงาน-1';

echo GridView::widget([
    'responsiveWrap' => false,
    'pjax' => true, /// ไม่ refresh หน้า แสดง Loading
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'panel' => [
        'before' => 'รายการแจ้งซ่อม'
    ],
    'dataProvider' => $dataProvider,
    'columns' => [//เปลี่ยนชือหัวตาราง
        ['class' => 'yii\grid\SerialColumn'],
        'name:text:ประเภทอุปกรณ์',
        'total:integer:จำนวน'
    ]
]);
//$data = [
//    ['name' => 'คอมฯ2', 'data' => [2]],
//    ['name' => 'เครื่องพิมพ์2', 'data' => [4]]
//];
//$data = [];
$color = ['red', 'green', 'blue', 'pink'];
$i = 0;
foreach ($raw as $r) {
//    echo $r['name']."<br>";
    $data[] = [
        'name' => $r['name'],
        'data' => [$r['total']*1],
        'color'=> $color[$i]
    ];
    $i++;
}
Highcharts::begin();
//echo Highcharts::widget(
//        [
//    'options' => [
//        'chart' => ['type' => 'column'],
//        'title' => ['text' => 'รายงานการซ่อมคอมฯ แยกอุปกรณ์'],
//        'xAxis' => [
//            'categories' => ['อุปกรณ์']
//        ],
//        'yAxis' => [
//            'title' => ['text' => 'จำนวน']
//        ],
//        'series' => $data
////        
//    ]
//]);
?>
<hr>
<div id="container"></div>
<?php
$data = json_encode($data);
$js = <<<JS
        $(function(){
            Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'รายงานการซ่อมคอมฯ แยกอุปกรณ์'
    },
    xAxis: {
        categories: ['ประเภท'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวน',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' เครื่อง'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: $data
});
        });     
JS;
$this->registerJs($js);
?>


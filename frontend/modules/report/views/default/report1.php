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

foreach ($raw as $r) {
//    echo $r['name']."<br>";
    $data[] = ['name' => $r['name'], 'data' => [$r['total']*1]];
}


echo Highcharts::widget([
    'options' => [
        'chart' => ['type' => 'column'],
        'title' => ['text' => 'รายงานการซ่อมคอมฯ แยกอุปกรณ์'],
        'xAxis' => [
            'categories' => ['อุปกรณ์']
        ],
        'yAxis' => [
            'title' => ['text' => 'จำนวน']
        ],
        'series' => $data
//        
    ]
]);
?>

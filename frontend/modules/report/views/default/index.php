<?php
use yii\helpers\Html;

$this->title = 'เมนูรายงาน';
$this->params['breadcrumbs'][] = 'รายงาน';
?>
<div class="report-default-index">
    <h1>เมนูรายงาน</h1>
    <?=Html::a('<i class="glyphicon glyphicon-file"></i> รายงาน 1 Column Chart',['/report/default/report1'],['class'=>'btn btn-info'])?>
     <?=Html::a('<i class="glyphicon glyphicon-file"></i> รายงาน 2 Barchart',['/report/default/report2'],['class'=>'btn btn-info'])?>
</div>

<?php
use yii\helpers\Html;

$this->title = 'เมนูรายงาน';
$this->params['breadcrumbs'][] = 'รายงาน';
?>
<div class="report-default-index">
    <h1>เมนูรายงาน</h1>
    <?=Html::a('<i class="glyphicon glyphicon-file"></i> รายงาน 1',['/report/default/report1'],['class'=>'btn btn-info'])?>
</div>

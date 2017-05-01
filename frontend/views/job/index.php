<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use frontend\models\CDeviceType;
use frontend\models\CRapid;
use frontend\models\CStatus;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แจ้งซ่อม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> แจ้งซ่อม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'responsiveWrap'=>false,
        'pjax'=>true, /// ไม่ refresh หน้า แสดง Loading
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'panel'=>[
            'before'=>'รายการแจ้งซ่อม'
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'date_add',
//            'devicetype.name',
            [
                'attribute'=>'device_type',
                'value'=>function($model){
                    $dt = CDeviceType::findOne($model->device_type);
                    return $dt->name;
                },
                'filter'=> ArrayHelper::map(CDeviceType::find()->all(),'id', 'name')
                
            ],
            'device_sn',
            'customer',
            'date_recept',
//            'cRapid.name',
            [
                'attribute'=>'job_rapid',
                'value'=>function($model){
                    $rp = CRapid::findOne($model->job_rapid);
                    return $rp->name;
                },
            'filter' => ArrayHelper::map(CRapid::find()->all(), 'id', 'name'),
            'contentOptions' => function ($model) {
                if ($model->job_rapid == '2') {
                    return ['style' => "color:black;background-color:orange", 'class' => 'text-center'];
                }else if ($model->job_rapid == '3') {
                    return ['style' => "color:white;background-color:red", 'class' => 'text-center'];
                }else{
                    return ['class' => 'text-center'];
                }
            },
        ],
//            'cStatus.name',
            [
                'attribute'=>'job_status',
                'value'=>function($model){
                    $st = CStatus::findOne($model->job_status);
                    return $st->name;
                },
                'filter'=> ArrayHelper::map(CStatus::find()->all(),'id', 'name')
            ],
            'date_end',
            'job_note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

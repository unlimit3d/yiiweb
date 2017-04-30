<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use frontend\models\CDeviceType;
use yii\helpers\ArrayHelper;
use frontend\models\CStatus;
use kartik\widgets\Select2;
use frontend\models\CRapid;

/* @var $this yii\web\View */
/* @var $model frontend\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <div class="col-md-3">
            <?= $form->field($model, 'date_add')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col-md-3">
            <?php 
            $dtype = CDeviceType::find()->where(['hidden'=>'N'])->all();            
//            $dt = ['1'=>'คอมพิวเตอร์', '2'=>'เครื่องพิมพ์'];
            $dt = ArrayHelper::map($dtype, 'id','name');
            
            ?>
            <?php
            echo $form->field($model, 'device_type')->widget(Select2::classname(), [
            'data' => $dt,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'device_sn')->textInput(['maxlength' => true, 'placeholder' => 'กรอกเลขครุภัณฑ์']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'customer')->textInput(['maxlength' => true, 'placeholder' => 'กรอกชื่อผู้แจ้งซ่อม']) ?>
        </div>
    </div>
    <div class="form-group">        
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'date_recept')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'ปปปป-ดด-วว'],
                'pickerButton' => [
                    'icon' => 'ok',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php // $form->field($model, 'job_rapid')->textInput(['maxlength' => true]) ?>
            <?php  
         $rapid = CRapid::find()->where(['hidden'=>'N'])->all();            
         $rp = ArrayHelper::map($rapid, 'id','name');
            
//        $st = ['1'=>'ปกติ', '2'=>'ด่วน']; ?>
            <?php //$form->field($model, 'job_status')->dropDownList($st,['prompt'=>'--เลือก--']) ?>
            <?php
            echo $form->field($model, 'job_rapid')->widget(Select2::classname(), [
            'data' => $rp,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
        </div>
        <div class="col-md-3">
          
        <?php  
         $sstatus = CStatus::find()->where(['hidden'=>'N'])->all();            
         $st = ArrayHelper::map($sstatus, 'id','name');
            
//        $st = ['1'=>'ปกติ', '2'=>'ด่วน']; ?>
            <?php //$form->field($model, 'job_status')->dropDownList($st,['prompt'=>'--เลือก--']) ?>
            <?php
            echo $form->field($model, 'job_status')->widget(Select2::classname(), [
            'data' => $st,
            'language' => 'th',
            'options' => ['placeholder' => 'เลือก ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'date_end')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'ปปปป-ดด-วว'],
                'pickerButton' => [
                    'icon' => 'ok',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-md-12">
            <?= $form->field($model, 'job_note')->textarea(['rows' => 3]) ?>
        </div>
    </div>
    <div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-ok"></i> แจ้งซ่อม' : '<i class="glyphicon glyphicon-edit"></i> ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

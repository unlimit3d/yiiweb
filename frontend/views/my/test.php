<?php
$this->title = "Test - Unlimit3d-Go!!";
use yii\helpers\Html;

// echo date("Y-m-d");
echo "id: $id <br>name: $name $lname<br>";

echo Html::a('<i class="glyphicon glyphicon-home"></i> ไปหน้า Index แบบ yii', ['my/index'], ['class'=>'btn btn-warning btn-sm']);
echo "<br>";
echo Html::a('<i class="glyphicon glyphicon-info-sign"></i> ไปหน้า About', ['site/about'], ['class'=>'btn btn-danger btn-lg']);
?>
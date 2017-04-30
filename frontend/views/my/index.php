<?php
$this->title = "หน้แรก - Unlimit3d-Go!!";

use yii\helpers\Html;
?>
<h3>รายการ.....</h3>
<!-- <a href="index.php?r=my/test" title="">ไป test แบบเดิม</a> -->
<br>
<?php
echo Html::a("<i class='glyphicon glyphicon-lock'></i> ไป Test", [
    'my/test',
    'id' => '001',
    'name' => 'wissarut',
    'lname' => 'kamto'
],['class'=>'btn btn-primary']);
?>

<!--<h1>my/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>-->

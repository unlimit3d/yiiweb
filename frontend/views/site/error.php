<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "Error";
?>
<div class="site-error">

    <!--<h1><? // Html::encode($this->title) ?></h1>-->

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <p>โปรติดต่อ ศูนย์คอมพิวเตอร์ โทร. 1702</p>


</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Biodata */

$this->title = 'Update Biodata';
?>
<div class="section-header">
    <h1><?= $this->title ?></h1>
</div>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
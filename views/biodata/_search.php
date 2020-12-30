<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BiodataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="biodata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'provinsi') ?>

    <?= $form->field($model, 'kabupaten') ?>

    <?= $form->field($model, 'nik') ?>

    <?php // echo $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'tempatlahir') ?>

    <?php // echo $form->field($model, 'tanggallahir') ?>

    <?php // echo $form->field($model, 'jkelamin') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'statuskawin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

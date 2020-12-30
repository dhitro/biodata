<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Biodata */
/* @var $form yii\widgets\ActiveForm */

$jk = ['L' => 'Laki-Laki', 'P' => 'Perempuan'];
$agama = ['ISLAM' => 'ISLAM', 'PROTESTAN' => 'PROTESTAN', 'KATOLIK' => 'KATOLIK', 'HINDU' => 'HINDU', 'BUDHA' => 'BUDHA', 'LAINNYA' => 'LAINNYA'];
$sts = ['LAJANG' => 'LAJANG', 'KAWIN' => 'KAWIN', 'CERAI' => 'CERAI'];


?>

<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Silahkan Isi Biodata</h4>
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin();

                if (!empty($model['username'])) {
                    $user = $model['username'];
                } else {
                    $user = Yii::$app->user->identity->username;
                }
                ?>

                <?= $form->field($model, 'username')->hiddenInput(['value' => $user])->label(false); ?>

                <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true])->label("Nama Provinsi") ?>

                <?= $form->field($model, 'kabupaten')->textInput(['maxlength' => true])->label("Nama Kabupaten") ?>

                <?= $form->field($model, 'nik')->textInput(['maxlength' => 16])->label("Nomor Induk Penduduk") ?>

                <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label("Nama Anda") ?>

                <?= $form->field($model, 'tempatlahir')->textInput(['maxlength' => true])->label("Tempat Lahir") ?>

                <?= $form->field($model, 'tanggallahir')->textInput(['class' => 'form-control datetimepicker'])->label("tanggal Lahir") ?>
                <div class="form-group">
                    <label for="jkelamin">Jenis Kelamin</label>
                    <?= $form->field($model, 'jkelamin')->dropDownList($jk, ['prompt' => 'Pilih Jenis Kelamin', 'style' => ' height: 50px;'])->label(false) ?>
                </div>
                <?= $form->field($model, 'alamat')->textInput(['maxlength' => true])->label("Alamat") ?>

                <div class="form-group">
                    <label for="jkelamin">Agama</label>
                    <?= $form->field($model, 'agama')->dropDownList($agama, ['prompt' => 'Pilih Agama', 'style' => ' height: 50px;'])->label(false) ?>
                </div>
                <div class="form-group">
                    <label for="jkelamin">Status Pernikahan</label>
                    <?= $form->field($model, 'statuskawin')->dropDownList($sts, ['prompt' => 'Pilih Status', 'style' => ' height: 50px;'])->label(false) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
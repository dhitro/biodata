<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

// $this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>

<section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
            <div class="p-4 m-3">
                <h4 class="text-dark font-weight-normal">Selamat Datang <span class="font-weight-bold">Di Aplikasi Biodata</span></h4>
                <p class="text-muted">Silahkan Login.</p>

                <?php if (Yii::$app->session->hasFlash('success')) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <span type="button" class="close" data-dismiss="alert"><span>&times;</span></span>
                        <?= Yii::$app->session->getFlash('success') ?>
                    </div>
                <?php endif; ?>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Username'])->label('') ?>
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password'])->label('') ?>
                <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::class, []) ?> 

                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                <?php ActiveForm::end(); ?>
                <br />

                <div class="mt-5 text-center">
                    Belum Punya Akun? <a href="auth-register.html">Buat Baru</a>
                </div>
                
                
            </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="assets/stisla/img/unsplash/login-bg.jpg">
            <div class="absolute-bottom-left index-2">
                <div class="text-light p-5 pb-2">
                    <div class="mb-5 pb-3">
                        <h1 class="mb-2 display-4 font-weight-bold">Semangat Pagi</h1>
                        <h5 class="font-weight-normal text-muted-transparent">Medan, Indonesia</h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

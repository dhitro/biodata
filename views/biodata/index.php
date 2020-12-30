<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BiodataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Biodatas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodata-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Biodata', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'provinsi',
            'kabupaten',
            'nik',
            //'nama',
            //'tempatlahir',
            //'tanggallahir',
            //'jkelamin',
            //'alamat',
            //'agama',
            //'statuskawin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

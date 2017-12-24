<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PegawaiGolonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawai Golongans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-golongan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pegawai Golongan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tbl_pegawai_golongan_id',
            'tbl_pegawai_golongan_nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

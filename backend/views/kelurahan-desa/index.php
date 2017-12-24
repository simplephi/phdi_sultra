<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KelurahanDesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kelurahan / Desa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelurahan-desa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('+ Tambah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kelurahan_desa_id',
            'kelurahan_desa_kode',
            'kelurahan_desa_nama',
            'kecamatan_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

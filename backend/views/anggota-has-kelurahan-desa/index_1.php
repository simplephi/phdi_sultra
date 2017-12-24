<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AnggotaHasKelurahanDesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Alamat Anggota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-has-kelurahan-desa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('+ Tambah ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'anggota_has_kelurahan_desa_id',
            'anggota.anggota_nama',
            //'anggota_id',
            //'kelurahan_desa_id',
            'kelurahanDesa.kelurahan_desa_nama',
            'jln',
            'rt',
            // 'rw',
            // 'mulai',
            // 'akhir',
            // 'ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

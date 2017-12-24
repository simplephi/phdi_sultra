<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tbl_pegawai_id',
            'tbl_pegawai_nama',
            'tbl_pegawai_tempat_lahir',
            'tbl_pegawai_tgl_lahir',
            'tbl_agama_id',
            // 'tbl_pegawai_jenis_kelamin',
            // 'tbl_pegawai_foto',
            // 'tbl_pegawai_gelar_depan',
            // 'tbl_pegawai_gelar_belakang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

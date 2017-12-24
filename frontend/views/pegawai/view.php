<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pegawai */

$this->title = $model->tbl_pegawai_id;
$this->params['breadcrumbs'][] = ['label' => 'Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tbl_pegawai_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tbl_pegawai_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tbl_pegawai_id',
            'tbl_pegawai_nama',
            'tbl_pegawai_tempat_lahir',
            'tbl_pegawai_tgl_lahir',
            'tbl_agama_id',
            'tbl_pegawai_jenis_kelamin',
            'tbl_pegawai_foto',
            'tbl_pegawai_gelar_depan',
            'tbl_pegawai_gelar_belakang',
        ],
    ]) ?>

</div>

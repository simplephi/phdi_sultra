<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AnggotaHasKelurahanDesa */

$this->title = $model->anggota_has_kelurahan_desa_id;
$this->params['breadcrumbs'][] = ['label' => 'Anggota Has Kelurahan Desas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-has-kelurahan-desa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->anggota_has_kelurahan_desa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->anggota_has_kelurahan_desa_id], [
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
            'anggota_has_kelurahan_desa_id',
            'anggota_id',
            'kelurahan_desa_id',
            'jln',
            'rt',
            'rw',
            'mulai',
            'akhir',
            'ket',
        ],
    ]) ?>

</div>

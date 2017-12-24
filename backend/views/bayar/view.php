<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bayar */

$this->title = $model->bayar_id;
$this->params['breadcrumbs'][] = ['label' => 'Bayars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bayar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bayar_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bayar_id], [
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
            'bayar_id',
            'anggota.anggota_nama',
            'bayar_tgl',
            'jumlah',
            'caraBayar.cara_bayar_nama',
            'jenisBayar.jenis_bayar_nama',
            'bukti_file',
            'bayar_bulan',
            'ket',
            'verifikasi',
        ],
    ]) ?>

</div>

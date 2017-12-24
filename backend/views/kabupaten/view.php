<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kabupaten */

$this->title = $model->kabupaten_nama;
$this->params['breadcrumbs'][] = ['label' => 'Kabupaten', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabupaten-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->kabupaten_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->kabupaten_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda Yakin Ingin Menghapus Data?',
                'method' => 'post',
            ],
        ]) ?>
          <?= Html::a('Kembali', ['/kabupaten/index'], ['class'=>'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kabupaten_id',
          //  'provinsi_id',
          'provinsi.provinsi_nama',
            'kabupaten_kode',
            'kabupaten_nama',
        ],
    ]) ?>

</div>

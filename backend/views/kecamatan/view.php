<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kecamatan */

$this->title = $model->kecamatan_nama;
$this->params['breadcrumbs'][] = ['label' => 'Kecamatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecamatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kecamatan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kecamatan_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda Yakin Ingin Menghapus Data?',
                'method' => 'post',
            ],
        ]) ?>
          <?= Html::a('Kembali', ['/kecamatan/index'], ['class'=>'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kecamatan_id',
            'kabupaten.kabupaten_nama',
            'kecamatan_kode',
            'kecamatan_nama',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KelurahanDesa */

$this->title = $model->kelurahan_desa_id;
$this->params['breadcrumbs'][] = ['label' => 'Kelurahan Desas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelurahan-desa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kelurahan_desa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kelurahan_desa_id], [
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
            'kelurahan_desa_id',
            'kelurahan_desa_kode',
            'kelurahan_desa_nama',
            'kecamatan_id',
        ],
    ]) ?>

</div>

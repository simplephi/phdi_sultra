<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KelurahanDesa */

$this->title = 'Ubah Kelurahan Desa: ' . $model->kelurahan_desa_nama;
$this->params['breadcrumbs'][] = ['label' => 'Kelurahan Desa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kelurahan_desa_nama, 'url' => ['view', 'id' => $model->kelurahan_desa_id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="kelurahan-desa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

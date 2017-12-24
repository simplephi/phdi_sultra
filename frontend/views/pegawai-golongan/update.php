<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PegawaiGolongan */

$this->title = 'Update Pegawai Golongan: ' . $model->tbl_pegawai_golongan_id;
$this->params['breadcrumbs'][] = ['label' => 'Pegawai Golongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tbl_pegawai_golongan_id, 'url' => ['view', 'id' => $model->tbl_pegawai_golongan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pegawai-golongan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

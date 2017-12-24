<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AnggotaHasKelurahanDesa */

$this->title = 'Update Anggota Has Kelurahan Desa: ' . $model->anggota_has_kelurahan_desa_id;
$this->params['breadcrumbs'][] = ['label' => 'Anggota Has Kelurahan Desas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->anggota_has_kelurahan_desa_id, 'url' => ['view', 'id' => $model->anggota_has_kelurahan_desa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anggota-has-kelurahan-desa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

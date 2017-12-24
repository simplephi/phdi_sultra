<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kecamatan */

$this->title = 'Ubah Kecamatan: ' . $model->kecamatan_nama;
$this->params['breadcrumbs'][] = ['label' => 'Kecamatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kecamatan_id, 'url' => ['view', 'id' => $model->kecamatan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kecamatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

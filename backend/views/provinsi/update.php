<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Provinsi */

$this->title = 'Ubah Provinsi: ' . $model->provinsi_nama;
$this->params['breadcrumbs'][] = ['label' => 'Provinsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->provinsi_id, 'url' => ['view', 'id' => $model->provinsi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="provinsi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

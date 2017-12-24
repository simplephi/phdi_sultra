<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KelurahanDesa */

$this->title = 'Update Kelurahan Desa: ' . $model->kelurahan_desa_id;
$this->params['breadcrumbs'][] = ['label' => 'Kelurahan Desas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kelurahan_desa_id, 'url' => ['view', 'id' => $model->kelurahan_desa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kelurahan-desa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

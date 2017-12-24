<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KelurahanDesaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelurahan-desa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kelurahan_desa_id') ?>

    <?= $form->field($model, 'kelurahan_desa_kode') ?>

    <?= $form->field($model, 'kelurahan_desa_nama') ?>

    <?= $form->field($model, 'kecamatan_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

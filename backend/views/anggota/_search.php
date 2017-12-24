<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AnggotaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'anggota_id') ?>

    <?= $form->field($model, 'anggota_nama') ?>

    <?= $form->field($model, 'anggota_t4_lahir') ?>

    <?= $form->field($model, 'anggota_tgl_lahir') ?>

    <?= $form->field($model, 'pekerjaan_id') ?>

    <?php // echo $form->field($model, 'pendidikan_id') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

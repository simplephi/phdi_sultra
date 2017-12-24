<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tbl_pegawai_id') ?>

    <?= $form->field($model, 'tbl_pegawai_nama') ?>

    <?= $form->field($model, 'tbl_pegawai_tempat_lahir') ?>

    <?= $form->field($model, 'tbl_pegawai_tgl_lahir') ?>

    <?= $form->field($model, 'tbl_agama_id') ?>

    <?php // echo $form->field($model, 'tbl_pegawai_jenis_kelamin') ?>

    <?php // echo $form->field($model, 'tbl_pegawai_foto') ?>

    <?php // echo $form->field($model, 'tbl_pegawai_gelar_depan') ?>

    <?php // echo $form->field($model, 'tbl_pegawai_gelar_belakang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

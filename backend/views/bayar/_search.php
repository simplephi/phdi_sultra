<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BayarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bayar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bayar_id') ?>

    <?= $form->field($model, 'anggota_id') ?>

    <?= $form->field($model, 'bayar_tgl') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'cara_bayar_id') ?>

    <?php // echo $form->field($model, 'jenis_bayar_id') ?>

    <?php // echo $form->field($model, 'bukti_file') ?>

    <?php // echo $form->field($model, 'bayar_bulan') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'verifikasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

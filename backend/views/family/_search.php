<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FamilySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="family-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'family_id') ?>

    <?= $form->field($model, 'family_kat_id') ?>

    <?= $form->field($model, 'anggota_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'pekerjaan_id') ?>

    <?php // echo $form->field($model, 'pendidikan_id') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'family_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

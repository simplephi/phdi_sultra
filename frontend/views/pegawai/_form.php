<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tbl_pegawai_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tbl_pegawai_tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tbl_pegawai_tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'tbl_agama_id')->textInput() ?>

    <?= $form->field($model, 'tbl_pegawai_jenis_kelamin')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tbl_pegawai_foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tbl_pegawai_gelar_depan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tbl_pegawai_gelar_belakang')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

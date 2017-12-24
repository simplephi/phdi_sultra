<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\Provinsi;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Kabupaten */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kabupaten-form">

    <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'provinsi_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Provinsi::find()->all(),'provinsi_id','provinsi_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Provinsi'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>

    <?= $form->field($model, 'kabupaten_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kabupaten_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

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
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          <?= Html::a('Kembali', ['/kabupaten/index'], ['class'=>'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

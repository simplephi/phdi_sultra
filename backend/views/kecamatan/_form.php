<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\Kabupaten;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Kecamatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kecamatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kabupaten_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Kabupaten::find()->all(),'kabupaten_id','kabupaten_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Kabupaten'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>

    <?= $form->field($model, 'kecamatan_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

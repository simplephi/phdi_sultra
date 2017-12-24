<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\Kecamatan;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\KelurahanDesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelurahan-desa-form">

    <?php $form = ActiveForm::begin(); ?>

    
     <?= $form->field($model, 'kecamatan_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Kecamatan::find()->all(),'kecamatan_id','kecamatan_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Kecamatan'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>
    <?= $form->field($model, 'kelurahan_desa_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelurahan_desa_nama')->textInput(['maxlength' => true]) ?>

  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

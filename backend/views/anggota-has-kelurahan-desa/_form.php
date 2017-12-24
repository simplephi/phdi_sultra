<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\KelurahanDesa;
use common\models\Anggota;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\AnggotaHasKelurahanDesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-has-kelurahan-desa-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'anggota_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Anggota::find()->all(),'anggota_id','anggota_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Anggota'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>

     <?= $form->field($model, 'kelurahan_desa_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(KelurahanDesa::find()->all(),'kelurahan_desa_id','kelurahan_desa_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Kelurahan/Desa'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>

    <?= $form->field($model, 'jln')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

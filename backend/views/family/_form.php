<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Pekerjaan;
use common\models\Pendidikan;
use common\models\Anggota;
use common\models\FamilyKat;
use kartik\select2\Select2;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Family */
/* @var $form yii\widgets\ActiveForm */
$form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $model->isNewRecord ? 'Tambah Data' : 'Edit Data' ?></h3>

        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm' : 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="box-body">
        <?= $form->field($model, 'family_kat_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(FamilyKat::find()->all(),'family_kat_id','family_kat_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Kategori Anggota Keluarga'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
      
        ?>

        <?= $form->field($model, 'anggota_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Anggota::find()->all(),'anggota_id','anggota_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Kepala Keluarga'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>
        
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
        <?php
            echo $form->field($model, 'tgl_lahir')
                ->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Tanggal Lahir...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ],
            ]);
        ?>

        <?= $form->field($model, 'pekerjaan_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Pekerjaan::find()->all(),'pekerjaan_id','pekerjaan_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Pekerjaan'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>
      
        <?= $form->field($model, 'pendidikan_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Pendidikan::find()->all(),'pendidikan_id','pendidikan_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Pendidikan'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>

        <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'family_ket')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

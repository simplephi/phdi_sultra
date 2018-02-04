<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Anggota;
use common\models\customs\abayar;
use common\models\CaraBayar;
use common\models\JenisBayar;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;
use kartik\money\MaskMoney;
/* @var $this yii\web\View */
/* @var $model common\models\Bayar */
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

        <?php
            echo $form->field($model, 'bayar_tgl')
                ->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Tanggal Pembayaran...'],
                    'pluginOptions' => [
                         'format' => 'yyyy-mm-dd hh:ii:ss',
                          'autoclose'=>true,
                        'todayHighlight' => true
                    ],
            ]);
        ?>

        <?= $form->field($model, 'jumlah')->widget(MaskMoney::classname(), [
               'options' => [
                   'placeholder' => 'Masukkan Jumlah Uang...'
               ],

        ]) ?>


         <?= $form->field($model, 'cara_bayar_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(CaraBayar::find()->all(),'cara_bayar_id','cara_bayar_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Cara Bayar'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>

        <?= $form->field($model, 'jenis_bayar_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(JenisBayar::find()->all(),'jenis_bayar_id','jenis_bayar_nama'),
            'language' => 'en',
           // 'tabindex' => false,
            'options' => ['placeholder' => 'Pilih Jenis Bayar'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
        ?>


        <?= $form->field($model, 'bukti_file')-> fileInput() ?>
        
        <?= $form->field($model, 'bayar_bulan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'verifikasi')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

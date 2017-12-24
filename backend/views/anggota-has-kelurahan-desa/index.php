<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AnggotaHasKelurahanDesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Alamat Anggota';
$this->params['breadcrumbs'][] = $this->title;
$js = <<< JS
    $(".btn-fresh").click(function(){
        $.pjax.reload({container:'#grid_container'});
    });
JS;
$this->registerJs($js, $this::POS_READY);

?>
<div class="anggota-has-kelurahan-desa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah ', ['create'], ['class' => 'btn btn-success']) ?>
        <?=  Html::button('<i class="fa fa-history" aria-hidden="true"></i> Refresh', ['class' => 'btn btn-primary btn-fresh']);?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout'=>true,
            'options' => [
                'id'=>'grid_container',
            ],
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'attribute' => 'anggota_id',
              'value' =>   'anggota.anggota_nama',
            ],

          [
            'attribute' => 'kelurahan_desa_id',
            'value' =>   'kelurahanDesa.kelurahan_desa_nama',
          ],
            'jln',
            'rt',
            // 'rw',
            // 'mulai',
            // 'akhir',
            // 'ket',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                  'view' => function($url, $model) {
                      $icon = '<i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>';
                      return Html::a($icon, $url);
                  },
                    'update' => function($url, $model) {
                        $icon = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                        return Html::a($icon, $url);
                    },
                    'delete' => function($url, $model) {
                        $icon = '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                        return Html::a($icon, $url, [
                            'data-confirm' => 'Anda yakin menghapus data ini?',
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
</div>

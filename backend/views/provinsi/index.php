<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProvinsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Provinsi';
$this->params['breadcrumbs'][] = $this->title;


$js = <<< JS
    $(".btn-fresh").click(function(){
        $.pjax.reload({container:'#grid_container'});
    });
JS;
$this->registerJs($js, $this::POS_READY);
?>
<div class="provinsi-index">

<!--    <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah', ['create'], ['class' => 'btn btn-success']) ?>
          <?=  Html::button('<i class="fa fa-history" aria-hidden="true"></i> Refresh', ['class' => 'btn btn-primary btn-fresh']);?>  </p>
    <?php echo
     GridView::widget([
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

//            'provinsi_id',
            'provinsi_kode',
            'provinsi_nama',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update} {delete} ',
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

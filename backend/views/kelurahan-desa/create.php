<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KelurahanDesa */

$this->title = 'Tambah Kelurahan Desa';
$this->params['breadcrumbs'][] = ['label' => 'Kelurahan Desa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelurahan-desa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

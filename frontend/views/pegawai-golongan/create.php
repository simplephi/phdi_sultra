<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PegawaiGolongan */

$this->title = 'Create Pegawai Golongan';
$this->params['breadcrumbs'][] = ['label' => 'Pegawai Golongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-golongan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AnggotaHasKelurahanDesa */

$this->title = 'Create Anggota Has Kelurahan Desa';
$this->params['breadcrumbs'][] = ['label' => 'Anggota Has Kelurahan Desas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-has-kelurahan-desa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

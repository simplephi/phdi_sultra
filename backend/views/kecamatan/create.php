<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Kecamatan */

$this->title = 'Tambah Kecamatan';
$this->params['breadcrumbs'][] = ['label' => 'Kecamatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecamatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

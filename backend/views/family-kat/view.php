<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FamilyKat */

$this->title = $model->family_kat_id;
$this->params['breadcrumbs'][] = ['label' => 'Family Kats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-kat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->family_kat_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->family_kat_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'family_kat_id',
            'family_kat_nama',
        ],
    ]) ?>

</div>

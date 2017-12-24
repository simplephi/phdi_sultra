<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FamilyKat */

$this->title = 'Update Kategori Family: ' . $model->family_kat_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Kategori Anggota Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]) ?>

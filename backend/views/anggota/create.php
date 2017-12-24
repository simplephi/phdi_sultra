<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Anggota */

$this->title = 'Tambah Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Data Anggota', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>

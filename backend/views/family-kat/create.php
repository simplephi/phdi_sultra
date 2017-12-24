<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FamilyKat */

$this->title = 'Tambah Kategori Family';
$this->params['breadcrumbs'][] = ['label' => 'Data Kategori Anggota Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>

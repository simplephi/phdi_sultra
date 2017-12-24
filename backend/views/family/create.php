<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Family */

$this->title = 'Tambah Family';
$this->params['breadcrumbs'][] = ['label' => 'Data Anggota Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>

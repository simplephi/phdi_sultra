<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pendidikan */

$this->title = 'Tambah Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Data Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>

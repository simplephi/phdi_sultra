<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pekerjaan */

$this->title = 'Tambah Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Data Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>

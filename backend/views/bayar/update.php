<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bayar */

$this->title = 'Update Bayar: ' . $model->bayar_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Bayar', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>

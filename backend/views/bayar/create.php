<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bayar */

$this->title = 'Tambah Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Data Bayar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>

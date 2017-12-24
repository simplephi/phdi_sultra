<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Anggota */

$this->title = 'Update Anggota: ' . $model->anggota_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Anggota', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>

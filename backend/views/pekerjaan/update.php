<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pekerjaan */

$this->title = 'Update Pekerjaan: ' . $model->pekerjaan_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>

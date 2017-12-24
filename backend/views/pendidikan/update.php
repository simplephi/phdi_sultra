<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pendidikan */

$this->title = 'Update Pendidikan: ' . $model->pendidikan_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>

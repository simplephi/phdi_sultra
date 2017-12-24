<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Family */

$this->title = 'Update Family: ' . $model->family_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Anggota Keluarga', 'url' => ['index']];

echo $this->render('_form', [
	'model' => $model,
]);

?>

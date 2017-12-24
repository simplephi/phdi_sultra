<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PegawaiGolonganController implements the CRUD actions for PegawaiGolongan model.
 */
class PegawaiGolonganController extends BaseController
{
    /**
     * @var Kampus     */
    public $modelClass = 'frontend\models\PegawaiGolongan';

    /**
     * @var KampusSearch     */
    public $modelSearchClass = 'frontend\models\search\PegawaiGolonganSearch';

    /**
     * @var primaryKey
     */
    public $primaryKey = 'tbl_pegawai_golongan_id';


    public function actionCoba()
    {
        echo "Function coba";
    }
}
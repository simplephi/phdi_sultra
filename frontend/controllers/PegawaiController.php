<?php

namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends BaseController
{
    /**
     * @var Kampus     */
    public $modelClass = 'frontend\models\Pegawai';

    /**
     * @var KampusSearch     */
    public $modelSearchClass = 'frontend\models\search\PegawaiSearch';

    /**
     * @var primaryKey
     */
    public $primaryKey = 'tbl_pegawai_id';
}

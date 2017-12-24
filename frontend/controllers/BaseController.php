<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\rbac\Item;

/**
* BaseControllers
* extended yii\web\Controller
*/
abstract class BaseController extends Controller
{
    /**
     * @var ActiveRecord
     */
    public $modelClass;

    /**
     * @var ActiveRecord
     */
    public $modelSearchClass;

    /**
     * @var $rimaryKey
     */
    public $primaryKey;    
    
    /**
     * Index page view
     *
     * @var string
     */
    public $indexView = 'index';

    /**
     * View page view
     *
     * @var string
     */
    public $viewView = 'view';

    /**
     * Create page view
     *
     * @var string
     */
    public $createView = 'create';

    /**
     * Update page view
     *
     * @var string
     */
    public $updateView = 'update';

    protected $_request;

    protected $_db;

    protected $_session;

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'get-role' => ['post'],
                    'toggle-status' => ['post'],
                    'list-sms' => ['post'],
                    'grid-page-size' => ['post'],
                ],
            ],
        ]);
    }

    public function init()
    {
        $this->_request = Yii::$app->request;
        $this->_db = Yii::$app->db;
        $this->_session = Yii::$app->session;
    }

    /**
     * Lists all models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new TmpMhsSearch();
        $searchModel = $this->modelSearchClass ? new $this->modelSearchClass : null;
        //$searchModel = $this->modelClass ? new $this->modelClass : null;
        $dataProvider = $searchModel->search($this->_request->queryParams);
        return $this->render($this->indexView, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mahasiswa model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render($this->viewView, [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new $this->modelClass;

        if ($model->load($this->_request->post()) && $model->save()) {
            return $this->redirect([$this->viewView, 'id' => $model->$this->primaryKey]);
        } else {
            return $this->render($this->createView, [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mahasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($this->_request->post()) && $model->save()) {
            return $this->redirect([$this->viewView, 'id' => $model->$this->primaryKey]);
        } else {
            return $this->render($this->updateView, [
                'model' => $model,
            ]);
        }
    }

    /**
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($this->findModel($id)->delete()) {
                $transaction->commit();
                Yii::$app->session->setFlash('success','Data berhasil dihapus');
                return $this->redirect(['index']);
            } else {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Terjadi kesalahan, data tidak bisa dihapus');
                return $this->redirect(['index']);
            }
        } catch (\Exception $ecx) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error','Terjadi kesalahan, data tidak bisa dihapus');
            return $this->redirect(['index']);
        }
        //return $this->redirect(['index']);
    }

    /**
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $modelClass = $this->modelClass;
        try {
            if (($model = $modelClass::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('Halaman yang dicari tidak ditemukan.');
            }
        } catch (\Exception $e) {
            throw new NotFoundHttpException('Halaman yang dicari tidak ditemukan.');
        }
        /*if (($model = $modelClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }*/
    }

    /**
     * Set page size for grid
     */
    public function actionGridPageSize()
    {
        if ($this->_request->post('grid-page-size')) {
            $cookie = new Cookie([
                'name' => '_grid_page_size',
                'value' => $this->_request->post('grid-page-size'),
                'expire' => time() + 3600, // 1 hari
                //'expire' => time() + 86400 * 7, // 7 hari
                //'expire' => time() + 86400 * 365, // 1 year
            ]);
            Yii::$app->response->cookies->add($cookie);
        }
    }
}
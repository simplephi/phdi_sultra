<?php

namespace backend\controllers;

use Yii;
use common\models\Bayar;
use backend\models\BayarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BayarController implements the CRUD actions for Bayar model.
 */
class BayarController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bayar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BayarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bayar model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bayar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bayar();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            $imageName = 'file_'. $model->anggota_id;
            $model->bukti_file = UploadedFile::getInstance($model, 'bukti_file');
            $model->bukti_file->saveAs('bukti/' .$imageName. '.' .$model->bukti_file->extension);
            $model->bukti_file = 'bukti/' .$imageName. '.' .$model->bukti_file->extension;

            try {
                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Data berhasil disimpan');

                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa disimpan');
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bayar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            $imageName = 'file_'. $model->anggota_id;
            $model->bukti_file = UploadedFile::getInstance($model, 'bukti_file');
            $model->bukti_file->saveAs('bukti/' .$imageName. '.' .$model->bukti_file->extension);
            $model->bukti_file = 'bukti/' .$imageName. '.' .$model->bukti_file->extension;

            try {
                if ($model->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Data berhasil disimpan');
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Rollback transaction. Data tidak bisa disimpan');
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Bayar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($model->delete()) {
                $transaction->commit();
                Yii::$app->session->setFlash('success','Data berhasil dihapus');
            } else {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak berhasil dihapus');
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error','Rollback transaction, Data tidak berhasil dihapus');
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Bayar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bayar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bayar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

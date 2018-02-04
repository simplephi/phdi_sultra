<?php

namespace backend\controllers;

use Yii;
use common\models\Anggota;
use backend\models\AnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AnggotaController implements the CRUD actions for Anggota model.
 */
class AnggotaController extends Controller
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
     * Lists all Anggota models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anggota model.
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
     * Creates a new Anggota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Anggota();

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();


            $imageName = 'photo_'. $model->anggota_nama;
            $model->foto = UploadedFile::getInstance($model, 'foto');
            $model->foto->saveAs('foto_anggota/' .$imageName. '.' .$model->foto->extension);
            $model->foto = 'foto_anggota/' .$imageName. '.' .$model->foto->extension;

            try {
                if ($model->save()) {

                    $transaction->commit();
                    Yii::$app->session->setFlash('success','Data berhasil disimpan');
                }
                else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error','Terjadi kesalahan, Data tidak bisa disimpan');
                }
            }
            catch (\Exception $e) {
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
     * Updates an existing Anggota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            $imageName = 'photo_'. $model->anggota_nama;
            $model->foto = UploadedFile::getInstance($model, 'foto');
            $model->foto->saveAs('foto_anggota/' .$imageName. '.' .$model->foto->extension);
            $model->foto = 'foto_anggota/' .$imageName. '.' .$model->foto->extension;

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
     * Deletes an existing Anggota model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

     public function actionfoto($id){
       $foto = Anggota::find()->where(['anggota_id' => $id])->one()->foto;
       if($foto){
         if(!unlink($foto)){
            return false;
         }
       }

       $anggota = Anggota::findOne($id);
       $anggota->foto = NULL;
       $anggota->update();
       return $this->redirect(['update', 'id' => $id]);

     }


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
     * Finds the Anggota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anggota the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anggota::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

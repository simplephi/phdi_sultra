<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class RekapAnggotaController extends Controller {

  public function actionIndex()
  {
    $query = Yii::$app->db->createCommand("SELECT * FROM (select * from (SELECT anggota.anggota_id as id_anggota, anggota.anggota_nama as nama_anggota, sum(bayar.jumlah) as total_bayar FROM anggota left JOIN bayar on bayar.anggota_id=anggota.anggota_id
    GROUP BY id_anggota, nama_anggota) as aa LEFT JOIN anggota ON anggota.anggota_id=aa.id_anggota) as BB LEFT JOIN pekerjaan ON pekerjaan.pekerjaan_id=BB.pekerjaan_id") //Masukkan QUERY
                          ->queryAll();
    return $this->render('index', [
      'query' => $query
    ]);
  }
}

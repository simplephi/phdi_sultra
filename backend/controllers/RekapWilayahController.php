<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class RekapWilayahController extends Controller {
  public function actionIndex()
  {
    $query = Yii::$app->db->createCommand("
    Select sum(b.jumlah) as total_bayar, d.kelurahan_desa_nama
    FROM anggota a, bayar b, anggota_has_kelurahan_desa c, kelurahan_desa d
    Where a.anggota_id = b.anggota_id AND c.kelurahan_desa_id = d.kelurahan_desa_id AND a.anggota_id = c.anggota_id
    Group by d.kelurahan_desa_id
    ") //Masukkan QUERY
    ->queryAll();

    return $this->render('index', [
      'query' => $query
    ]);
  }
}

<?php

namespace common\models\customs;

use common\models\Bayar;

/**
* extend backend\models\MbKegiatan;
*/
class abayar extends Bayar
{
  public function attributeLabels()
  {
      return [
          'bayar_id' => 'Bayar ID',
          'anggota_id' => 'Anggota ID',
          'bayar_tgl' => 'Bayar Tgl',
          'jumlah' => 'Jumlah Uang Saya',
          'cara_bayar_id' => 'Cara Bayar ID',
          'jenis_bayar_id' => 'Jenis Bayar ID',
          'bukti_file' => 'Bukti File',
          'bayar_bulan' => 'Bayar PerBulan',
          'ket' => 'Ket',
          'verifikasi' => 'Verifikasi',
      ];
  }

}

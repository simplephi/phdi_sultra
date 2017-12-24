<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bayar".
 *
 * @property integer $bayar_id
 * @property integer $anggota_id
 * @property string $bayar_tgl
 * @property double $jumlah
 * @property integer $cara_bayar_id
 * @property integer $jenis_bayar_id
 * @property string $bukti_file
 * @property string $bayar_bulan
 * @property string $ket
 * @property string $verifikasi
 *
 * @property Anggota $anggota
 * @property CaraBayar $caraBayar
 * @property JenisBayar $jenisBayar
 */
class Bayar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bayar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anggota_id', 'cara_bayar_id', 'jenis_bayar_id'], 'required'],
            [['anggota_id', 'cara_bayar_id', 'jenis_bayar_id'], 'integer'],
            [['bayar_tgl', 'bayar_bulan'], 'safe'],
            [['jumlah'], 'number'],
            [['verifikasi'], 'string'],
            [['bukti_file'], 'string', 'max' => 145],
            [['ket'], 'string', 'max' => 45],
            [['anggota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['anggota_id' => 'anggota_id']],
            [['cara_bayar_id'], 'exist', 'skipOnError' => true, 'targetClass' => CaraBayar::className(), 'targetAttribute' => ['cara_bayar_id' => 'cara_bayar_id']],
            [['jenis_bayar_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisBayar::className(), 'targetAttribute' => ['jenis_bayar_id' => 'jenis_bayar_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bayar_id' => 'Bayar ID',
            'anggota_id' => 'Anggota ID',
            'bayar_tgl' => 'Bayar Tgl',
            'jumlah' => 'Jumlah',
            'cara_bayar_id' => 'Cara Bayar ID',
            'jenis_bayar_id' => 'Jenis Bayar ID',
            'bukti_file' => 'Bukti File',
            'bayar_bulan' => 'Bayar Bulan',
            'ket' => 'Ket',
            'verifikasi' => 'Verifikasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggota()
    {
        return $this->hasOne(Anggota::className(), ['anggota_id' => 'anggota_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaraBayar()
    {
        return $this->hasOne(CaraBayar::className(), ['cara_bayar_id' => 'cara_bayar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisBayar()
    {
        return $this->hasOne(JenisBayar::className(), ['jenis_bayar_id' => 'jenis_bayar_id']);
    }
}

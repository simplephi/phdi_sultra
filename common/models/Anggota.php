<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anggota".
 *
 * @property integer $anggota_id
 * @property string $anggota_nama
 * @property string $anggota_t4_lahir
 * @property string $anggota_tgl_lahir
 * @property integer $pekerjaan_id
 * @property integer $pendidikan_id
 * @property string $foto
 * @property string $jenis_kelamin
 *
 * @property Pekerjaan $pekerjaan
 * @property Pendidikan $pendidikan
 * @property AnggotaHasJenisIdentitas[] $anggotaHasJenisIdentitas
 * @property AnggotaHasKelurahanDesa[] $anggotaHasKelurahanDesas
 * @property Bayar[] $bayars
 * @property Family[] $families
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anggota_tgl_lahir'], 'safe'],
            [['pekerjaan_id', 'pendidikan_id'], 'integer'],
            [['jenis_kelamin'], 'string'],
            [['anggota_nama'], 'string', 'max' => 245],
            [['anggota_t4_lahir', 'foto'], 'string', 'max' => 45],
            [['pekerjaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pekerjaan::className(), 'targetAttribute' => ['pekerjaan_id' => 'pekerjaan_id']],
            [['pendidikan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pendidikan::className(), 'targetAttribute' => ['pendidikan_id' => 'pendidikan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'anggota_id' => 'Anggota ID',
            'anggota_nama' => 'Nama Kepala Keluarga ',
            'anggota_t4_lahir' => 'Tempat Lahir',
            'anggota_tgl_lahir' => 'Tgl Lahir',
            'pekerjaan_id' => 'Pekerjaan ',
            'pendidikan_id' => 'Pendidikan ',
            'foto' => 'Foto',
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaan()
    {
        return $this->hasOne(Pekerjaan::className(), ['pekerjaan_id' => 'pekerjaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikan()
    {
        return $this->hasOne(Pendidikan::className(), ['pendidikan_id' => 'pendidikan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaHasJenisIdentitas()
    {
        return $this->hasMany(AnggotaHasJenisIdentitas::className(), ['anggota_id' => 'anggota_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaHasKelurahanDesas()
    {
        return $this->hasMany(AnggotaHasKelurahanDesa::className(), ['anggota_id' => 'anggota_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBayars()
    {
        return $this->hasMany(Bayar::className(), ['anggota_id' => 'anggota_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilies()
    {
        return $this->hasMany(Family::className(), ['anggota_id' => 'anggota_id']);
    }
}

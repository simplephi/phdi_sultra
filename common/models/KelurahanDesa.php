<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kelurahan_desa".
 *
 * @property integer $kelurahan_desa_id
 * @property string $kelurahan_desa_kode
 * @property string $kelurahan_desa_nama
 * @property integer $kecamatan_id
 *
 * @property AnggotaHasKelurahanDesa[] $anggotaHasKelurahanDesas
 * @property Kecamatan $kecamatan
 */
class KelurahanDesa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelurahan_desa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kecamatan_id'], 'required'],
            [['kecamatan_id'], 'integer'],
            [['kelurahan_desa_kode'], 'string', 'max' => 45],
            [['kelurahan_desa_nama'], 'string', 'max' => 145],
            [['kecamatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['kecamatan_id' => 'kecamatan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kelurahan_desa_id' => 'Kelurahan Desa ID',
            'kelurahan_desa_kode' => 'Kelurahan Desa Kode',
            'kelurahan_desa_nama' => 'Kelurahan Desa Nama',
            'kecamatan_id' => 'Kecamatan ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaHasKelurahanDesas()
    {
        return $this->hasMany(AnggotaHasKelurahanDesa::className(), ['kelurahan_desa_id' => 'kelurahan_desa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['kecamatan_id' => 'kecamatan_id']);
    }
}

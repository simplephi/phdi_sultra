<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property integer $kabupaten_id
 * @property integer $provinsi_id
 * @property string $kabupaten_kode
 * @property string $kabupaten_nama
 *
 * @property Provinsi $provinsi
 * @property Kecamatan[] $kecamatans
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinsi_id'], 'required'],
            [['provinsi_id'], 'integer'],
            [['kabupaten_kode'], 'string', 'max' => 45],
            [['kabupaten_nama'], 'string', 'max' => 145],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['provinsi_id' => 'provinsi_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kabupaten_id' => 'ID Kabupaten ',
            'provinsi_id' => 'ID Provinsi ',
            'kabupaten_kode' => 'Kode Kabupaten ',
            'kabupaten_nama' => 'Nama Kabupaten ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['provinsi_id' => 'provinsi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatans()
    {
        return $this->hasMany(Kecamatan::className(), ['kabupaten_id' => 'kabupaten_id']);
    }
}

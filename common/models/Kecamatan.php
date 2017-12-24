<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property integer $kecamatan_id
 * @property integer $kabupaten_id
 * @property string $kecamatan_kode
 * @property string $kecamatan_nama
 *
 * @property Kabupaten $kabupaten
 * @property KelurahanDesa[] $kelurahanDesas
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kabupaten_id'], 'required'],
            [['kabupaten_id'], 'integer'],
            [['kecamatan_kode'], 'string', 'max' => 45],
            [['kecamatan_nama'], 'string', 'max' => 145],
            [['kabupaten_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['kabupaten_id' => 'kabupaten_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kecamatan_id' => 'ID Kecamatan ',
            'kabupaten_id' => 'Kabupaten ',
            'kecamatan_kode' => 'Kode Kecamatan ',
            'kecamatan_nama' => 'Nama Kecamatan ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['kabupaten_id' => 'kabupaten_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahanDesas()
    {
        return $this->hasMany(KelurahanDesa::className(), ['kecamatan_id' => 'kecamatan_id']);
    }
}

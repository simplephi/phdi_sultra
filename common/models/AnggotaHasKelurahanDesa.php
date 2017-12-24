<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anggota_has_kelurahan_desa".
 *
 * @property integer $anggota_has_kelurahan_desa_id
 * @property integer $anggota_id
 * @property integer $kelurahan_desa_id
 * @property string $jln
 * @property string $rt
 * @property string $rw
 * @property string $mulai
 * @property string $akhir
 * @property string $ket
 *
 * @property Anggota $anggota
 * @property KelurahanDesa $kelurahanDesa
 */
class AnggotaHasKelurahanDesa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota_has_kelurahan_desa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anggota_id', 'kelurahan_desa_id'], 'required'],
            [['anggota_id', 'kelurahan_desa_id'], 'integer'],
            [['mulai', 'akhir'], 'safe'],
            [['ket'], 'string'],
            [['jln'], 'string', 'max' => 145],
            [['rt', 'rw'], 'string', 'max' => 45],
            [['anggota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['anggota_id' => 'anggota_id']],
            [['kelurahan_desa_id'], 'exist', 'skipOnError' => true, 'targetClass' => KelurahanDesa::className(), 'targetAttribute' => ['kelurahan_desa_id' => 'kelurahan_desa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'anggota_has_kelurahan_desa_id' => 'Anggota Has Kelurahan Desa ID',
            'anggota_id' => 'Anggota ID',
            'kelurahan_desa_id' => 'Kelurahan Desa ID',
            'jln' => 'Jln',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'mulai' => 'Mulai',
            'akhir' => 'Akhir',
            'ket' => 'Ket',
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
    public function getKelurahanDesa()
    {
        return $this->hasOne(KelurahanDesa::className(), ['kelurahan_desa_id' => 'kelurahan_desa_id']);
    }
}

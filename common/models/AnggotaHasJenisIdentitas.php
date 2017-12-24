<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anggota_has_jenis_identitas".
 *
 * @property integer $anggota_has_jenis_identitas_id
 * @property integer $anggota_id
 * @property integer $jenis_identitas_id
 * @property string $nomor
 * @property string $mulai
 * @property string $akhir
 * @property string $file
 *
 * @property Anggota $anggota
 * @property JenisIdentitas $jenisIdentitas
 */
class AnggotaHasJenisIdentitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota_has_jenis_identitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anggota_id', 'jenis_identitas_id'], 'required'],
            [['anggota_id', 'jenis_identitas_id'], 'integer'],
            [['mulai', 'akhir'], 'safe'],
            [['nomor'], 'string', 'max' => 145],
            [['file'], 'string', 'max' => 245],
            [['anggota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['anggota_id' => 'anggota_id']],
            [['jenis_identitas_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisIdentitas::className(), 'targetAttribute' => ['jenis_identitas_id' => 'jenis_identitas_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'anggota_has_jenis_identitas_id' => 'Anggota Has Jenis Identitas ID',
            'anggota_id' => 'Anggota ID',
            'jenis_identitas_id' => 'Jenis Identitas ID',
            'nomor' => 'Nomor',
            'mulai' => 'Mulai',
            'akhir' => 'Akhir',
            'file' => 'File',
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
    public function getJenisIdentitas()
    {
        return $this->hasOne(JenisIdentitas::className(), ['jenis_identitas_id' => 'jenis_identitas_id']);
    }
}

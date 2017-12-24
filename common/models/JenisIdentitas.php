<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jenis_identitas".
 *
 * @property integer $jenis_identitas_id
 * @property string $jenis_identitas_nama
 *
 * @property AnggotaHasJenisIdentitas[] $anggotaHasJenisIdentitas
 */
class JenisIdentitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_identitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_identitas_nama'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jenis_identitas_id' => 'Jenis Identitas ID',
            'jenis_identitas_nama' => 'Jenis Identitas Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaHasJenisIdentitas()
    {
        return $this->hasMany(AnggotaHasJenisIdentitas::className(), ['jenis_identitas_id' => 'jenis_identitas_id']);
    }
}

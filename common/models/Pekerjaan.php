<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pekerjaan".
 *
 * @property integer $pekerjaan_id
 * @property string $pekerjaan_nama
 * @property string $ket
 *
 * @property Anggota[] $anggotas
 * @property Family[] $families
 * @property Family[] $families0
 */
class Pekerjaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pekerjaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pekerjaan_nama', 'ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pekerjaan_id' => 'Pekerjaan',
            'pekerjaan_nama' => 'Pekerjaan',
            'ket' => 'Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotas()
    {
        return $this->hasMany(Anggota::className(), ['pekerjaan_id' => 'pekerjaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilies()
    {
        return $this->hasMany(Family::className(), ['pekerjaan_id' => 'pekerjaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilies0()
    {
        return $this->hasMany(Family::className(), ['pekerjaan_id' => 'pekerjaan_id']);
    }
}

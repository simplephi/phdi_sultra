<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property integer $pendidikan_id
 * @property string $pendidikan_nama
 * @property string $pendidikan_ket
 *
 * @property Anggota[] $anggotas
 * @property Family[] $families
 */
class Pendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pendidikan_nama'], 'string', 'max' => 145],
            [['pendidikan_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pendidikan_id' => 'Pendidikan',
            'pendidikan_nama' => 'Pendidikan ',
            'pendidikan_ket' => 'Pendidikan Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotas()
    {
        return $this->hasMany(Anggota::className(), ['pendidikan_id' => 'pendidikan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilies()
    {
        return $this->hasMany(Family::className(), ['pendidikan_id' => 'pendidikan_id']);
    }
}

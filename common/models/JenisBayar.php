<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jenis_bayar".
 *
 * @property integer $jenis_bayar_id
 * @property string $jenis_bayar_nama
 * @property string $jenis_bayar_key
 *
 * @property Bayar[] $bayars
 */
class JenisBayar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_bayar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_bayar_nama', 'jenis_bayar_key'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jenis_bayar_id' => 'Jenis Bayar ID',
            'jenis_bayar_nama' => 'Jenis Bayar',
            'jenis_bayar_key' => 'Jenis Bayar Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBayars()
    {
        return $this->hasMany(Bayar::className(), ['jenis_bayar_id' => 'jenis_bayar_id']);
    }
}

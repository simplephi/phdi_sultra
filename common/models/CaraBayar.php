<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cara_bayar".
 *
 * @property integer $cara_bayar_id
 * @property string $cara_bayar_nama
 * @property string $cara_bayar_ket
 *
 * @property Bayar[] $bayars
 */
class CaraBayar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cara_bayar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cara_bayar_nama', 'cara_bayar_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cara_bayar_id' => 'Cara Bayar ID',
            'cara_bayar_nama' => 'Cara Bayar',
            'cara_bayar_ket' => 'Cara Bayar Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBayars()
    {
        return $this->hasMany(Bayar::className(), ['cara_bayar_id' => 'cara_bayar_id']);
    }
}

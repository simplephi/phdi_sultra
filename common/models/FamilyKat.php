<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "family_kat".
 *
 * @property integer $family_kat_id
 * @property string $family_kat_nama
 *
 * @property Family[] $families
 */
class FamilyKat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'family_kat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['family_kat_nama'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'family_kat_id' => 'Family Kat ID',
            'family_kat_nama' => 'Kategori Family',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilies()
    {
        return $this->hasMany(Family::className(), ['family_kat_id' => 'family_kat_id']);
    }
}

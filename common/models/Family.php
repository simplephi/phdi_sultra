<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "family".
 *
 * @property integer $family_id
 * @property integer $family_kat_id
 * @property integer $anggota_id
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property integer $pekerjaan_id
 * @property integer $pendidikan_id
 * @property string $foto
 * @property string $family_ket
 *
 * @property Anggota $anggota
 * @property FamilyKat $familyKat
 * @property Pekerjaan $pekerjaan
 * @property Pekerjaan $pekerjaan0
 * @property Pendidikan $pendidikan
 */
class Family extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'family';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['family_kat_id', 'anggota_id', 'pekerjaan_id'], 'required'],
            [['family_kat_id', 'anggota_id', 'pekerjaan_id', 'pendidikan_id'], 'integer'],
            [['jenis_kelamin'], 'string'],
            [['tgl_lahir'], 'safe'],
            [['nama'], 'string', 'max' => 145],
            [['tempat_lahir', 'foto', 'family_ket'], 'string', 'max' => 45],
            [['anggota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['anggota_id' => 'anggota_id']],
            [['family_kat_id'], 'exist', 'skipOnError' => true, 'targetClass' => FamilyKat::className(), 'targetAttribute' => ['family_kat_id' => 'family_kat_id']],
            [['pekerjaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pekerjaan::className(), 'targetAttribute' => ['pekerjaan_id' => 'pekerjaan_id']],
            [['pekerjaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pekerjaan::className(), 'targetAttribute' => ['pekerjaan_id' => 'pekerjaan_id']],
            [['pendidikan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pendidikan::className(), 'targetAttribute' => ['pendidikan_id' => 'pendidikan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'family_id' => 'Family ID',
            'family_kat_id' => 'Kategori Family',
            'anggota_id' => 'Anggota ID',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'pekerjaan_id' => 'Pekerjaan',
            'pendidikan_id' => 'Pendidikan',
            'foto' => 'Foto',
            'family_ket' => 'Family Ket',
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
    public function getFamilyKat()
    {
        return $this->hasOne(FamilyKat::className(), ['family_kat_id' => 'family_kat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaan()
    {
        return $this->hasOne(Pekerjaan::className(), ['pekerjaan_id' => 'pekerjaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaan0()
    {
        return $this->hasOne(Pekerjaan::className(), ['pekerjaan_id' => 'pekerjaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikan()
    {
        return $this->hasOne(Pendidikan::className(), ['pendidikan_id' => 'pendidikan_id']);
    }
}

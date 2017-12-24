<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Family;

/**
 * FamilySearch represents the model behind the search form about `common\models\Family`.
 */
class FamilySearch extends Family
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['family_id', 'family_kat_id', 'anggota_id', 'pekerjaan_id', 'pendidikan_id'], 'integer'],
            [['nama', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'foto', 'family_ket'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Family::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'family_id' => $this->family_id,
            'family_kat_id' => $this->family_kat_id,
            'anggota_id' => $this->anggota_id,
            'tgl_lahir' => $this->tgl_lahir,
            'pekerjaan_id' => $this->pekerjaan_id,
            'pendidikan_id' => $this->pendidikan_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'family_ket', $this->family_ket]);

        return $dataProvider;
    }
}

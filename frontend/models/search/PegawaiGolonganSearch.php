<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\PegawaiGolongan;

/**
 * PegawaiGolonganSearch represents the model behind the search form about `frontend\models\PegawaiGolongan`.
 */
class PegawaiGolonganSearch extends PegawaiGolongan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tbl_pegawai_golongan_id'], 'integer'],
            [['tbl_pegawai_golongan_nama'], 'safe'],
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
        $query = PegawaiGolongan::find();

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
            'tbl_pegawai_golongan_id' => $this->tbl_pegawai_golongan_id,
        ]);

        $query->andFilterWhere(['like', 'tbl_pegawai_golongan_nama', $this->tbl_pegawai_golongan_nama]);

        return $dataProvider;
    }
}

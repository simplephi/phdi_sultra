<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KelurahanDesa;

/**
 * KelurahanDesaSearch represents the model behind the search form about `common\models\KelurahanDesa`.
 */
class KelurahanDesaSearch extends KelurahanDesa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kelurahan_desa_id'], 'integer'],
            [['kelurahan_desa_kode', 'kelurahan_desa_nama', 'kecamatan_id'], 'safe'],
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
        $query = KelurahanDesa::find();

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

        $query->joinWith('kecamatan');
        // grid filtering conditions
        $query->andFilterWhere([
            'kelurahan_desa_id' => $this->kelurahan_desa_id,
          //  'kecamatan_id' => $this->kecamatan_id,
        ]);

        $query->andFilterWhere(['like', 'kelurahan_desa_kode', $this->kelurahan_desa_kode])
            ->andFilterWhere(['like', 'kelurahan_desa_nama', $this->kelurahan_desa_nama])
            ->andFilterWhere(['like', 'kecamatan.kecamatan_nama', $this->kecamatan_id]);

        return $dataProvider;
    }
}

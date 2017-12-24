<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FamilyKat;

/**
 * FamilyKatSearch represents the model behind the search form about `common\models\FamilyKat`.
 */
class FamilyKatSearch extends FamilyKat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['family_kat_id'], 'integer'],
            [['family_kat_nama'], 'safe'],
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
        $query = FamilyKat::find();

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
            'family_kat_id' => $this->family_kat_id,
        ]);

        $query->andFilterWhere(['like', 'family_kat_nama', $this->family_kat_nama]);

        return $dataProvider;
    }
}

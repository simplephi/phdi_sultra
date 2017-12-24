<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kabupaten;

/**
 * KabupatenSearch represents the model behind the search form about `common\models\Kabupaten`.
 */
class KabupatenSearch extends Kabupaten
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kabupaten_id'], 'integer'],
            [['kabupaten_kode', 'kabupaten_nama', 'provinsi_id'], 'safe'],
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
        $query = Kabupaten::find();

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


        $query->joinWith('provinsi');  // Modelnya
        // grid filtering conditions
        $query->andFilterWhere([
            'kabupaten_id' => $this->kabupaten_id,
        //    'provinsi_id' => $this->provinsi_id,
        ]);

        $query->andFilterWhere(['like', 'kabupaten_kode', $this->kabupaten_kode])
            ->andFilterWhere(['like', 'kabupaten_nama', $this->kabupaten_nama])
            ->andFilterWhere(['like', 'provinsi.provinsi_nama', $this->provinsi_id])
            ;

        return $dataProvider;
    }
}

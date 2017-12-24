<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Anggota;

/**
 * AnggotaSearch represents the model behind the search form about `common\models\Anggota`.
 */
class AnggotaSearch extends Anggota
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anggota_id', 'pekerjaan_id', 'pendidikan_id'], 'integer'],
            [['anggota_nama', 'anggota_t4_lahir', 'anggota_tgl_lahir', 'foto', 'jenis_kelamin'], 'safe'],
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
        $query = Anggota::find();

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
            'anggota_id' => $this->anggota_id,
            'anggota_tgl_lahir' => $this->anggota_tgl_lahir,
            'pekerjaan_id' => $this->pekerjaan_id,
            'pendidikan_id' => $this->pendidikan_id,
        ]);

        $query->andFilterWhere(['like', 'anggota_nama', $this->anggota_nama])
            ->andFilterWhere(['like', 'anggota_t4_lahir', $this->anggota_t4_lahir])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin]);

        return $dataProvider;
    }
}

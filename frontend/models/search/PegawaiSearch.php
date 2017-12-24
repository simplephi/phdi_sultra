<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pegawai;

/**
 * PegawaiSearch represents the model behind the search form about `frontend\models\Pegawai`.
 */
class PegawaiSearch extends Pegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tbl_pegawai_id', 'tbl_agama_id'], 'integer'],
            [['tbl_pegawai_nama', 'tbl_pegawai_tempat_lahir', 'tbl_pegawai_tgl_lahir', 'tbl_pegawai_jenis_kelamin', 'tbl_pegawai_foto', 'tbl_pegawai_gelar_depan', 'tbl_pegawai_gelar_belakang'], 'safe'],
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
        $query = Pegawai::find();

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
            'tbl_pegawai_id' => $this->tbl_pegawai_id,
            'tbl_pegawai_tgl_lahir' => $this->tbl_pegawai_tgl_lahir,
            'tbl_agama_id' => $this->tbl_agama_id,
        ]);

        $query->andFilterWhere(['like', 'tbl_pegawai_nama', $this->tbl_pegawai_nama])
            ->andFilterWhere(['like', 'tbl_pegawai_tempat_lahir', $this->tbl_pegawai_tempat_lahir])
            ->andFilterWhere(['like', 'tbl_pegawai_jenis_kelamin', $this->tbl_pegawai_jenis_kelamin])
            ->andFilterWhere(['like', 'tbl_pegawai_foto', $this->tbl_pegawai_foto])
            ->andFilterWhere(['like', 'tbl_pegawai_gelar_depan', $this->tbl_pegawai_gelar_depan])
            ->andFilterWhere(['like', 'tbl_pegawai_gelar_belakang', $this->tbl_pegawai_gelar_belakang]);

        return $dataProvider;
    }
}

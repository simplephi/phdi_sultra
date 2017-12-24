<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AnggotaHasKelurahanDesa;

/**
 * AnggotaHasKelurahanDesaSearch represents the model behind the search form about `common\models\AnggotaHasKelurahanDesa`.
 * @property Anggota $anggota
 * @property KelurahanDesa $kelurahanDesa
 */

class AnggotaHasKelurahanDesaSearch extends AnggotaHasKelurahanDesa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anggota_has_kelurahan_desa_id'], 'integer'],
            [['jln', 'rt', 'rw', 'mulai', 'akhir', 'ket', 'anggota_id', 'kelurahan_desa_id'], 'safe'],

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
        $query = AnggotaHasKelurahanDesa::find();

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

        $query->joinWith(['anggota','kelurahanDesa']);

        // grid filtering conditions
        $query->andFilterWhere([
            'anggota_has_kelurahan_desa_id' => $this->anggota_has_kelurahan_desa_id,
        //    'anggota_id' => $this->anggota_id,
        //    'kelurahan_desa_id' => $this->kelurahan_desa_id,
            'mulai' => $this->mulai,
            'akhir' => $this->akhir,
        ]);

        $query->andFilterWhere(['like', 'jln', $this->jln])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'anggota.anggota_nama', $this->anggota_id])
            ->andFilterWhere(['like', 'kelurahanDesa.kelurahan_desa_nama', $this->kelurahan_desa_id])
            ;

        return $dataProvider;
    }
}

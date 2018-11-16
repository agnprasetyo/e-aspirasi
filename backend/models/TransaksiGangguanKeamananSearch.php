<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TransaksiGangguanKeamanan;

/**
 * TransaksiGangguanKeamananSearch represents the model behind the search form of `common\models\TransaksiGangguanKeamanan`.
 */
class TransaksiGangguanKeamananSearch extends TransaksiGangguanKeamanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'zoom'], 'integer'],
            [['tanggal', 'id_user', 'id_jenis', 'id_wilayah', 'zoom', 'longitude', 'latitude'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TransaksiGangguanKeamanan::find()
               ->joinWith(['user', 'jenis', 'wilayah'])
               ->where(['jenis.category' => 'kejahatan']);

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
            'id' => $this->id,
            'id_user' => $this->id_user,
            'tanggal' => $this->tanggal,
            // 'id_jenis' => $this->id_jenis,
            // 'id_wilayah' => $this->id_wilayah,
            'zoom' => $this->zoom,
            'approve' => $this->approve,
        ]);

        $query->andFilterWhere(['like', 'jenis.value', $this->id_jenis])
              ->andFilterWhere(['like', 'wilayah.kota', $this->id_wilayah])
              ->andFilterWhere(['like', 'longitude', $this->longitude])
              ->andFilterWhere(['like', 'latitude', $this->latitude]);

        return $dataProvider;
    }
}

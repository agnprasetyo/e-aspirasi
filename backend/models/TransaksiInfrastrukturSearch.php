<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TransaksiInfrastruktur;

/**
 * TransaksiInfrastrukturSearch represents the model behind the search form of `common\models\TransaksiInfrastruktur`.
 */
class TransaksiInfrastrukturSearch extends TransaksiInfrastruktur
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tanggal', 'id_user', 'id_jenis', 'id_wilayah', 'id_status', 'zoom', 'longitude', 'latitude'], 'safe'],
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
        $query = TransaksiInfrastruktur::find()
               ->joinWith(['user', 'jenis', 'wilayah', 'status'])
               ->where(['jenis.category' => 'infrastruktur']);

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
            // 'id_status' => $this->id_status,
            'zoom' => $this->zoom,
            'approve' => $this->approve,
        ]);



        $query->andFilterWhere(['like', 'jenis.value', $this->id_jenis])
              ->andFilterWhere(['like', 'wilayah.kota', $this->id_wilayah])
              ->andFilterWhere(['like', 'status.value', $this->id_status])
              ->andFilterWhere(['like', 'longitude', $this->longitude])
              ->andFilterWhere(['like', 'latitude', $this->latitude]);

        return $dataProvider;
    }
}

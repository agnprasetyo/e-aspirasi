<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TransaksiPelayanan;

/**
 * TransaksiPelayananSearch represents the model behind the search form of `common\models\TransaksiPelayanan`.
 */
class TransaksiPelayananSearch extends TransaksiPelayanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tanggal', 'id_user', 'id_jenis', 'id_wilayah', 'id_review', 'id_tempat'], 'safe'],
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
        $query = TransaksiPelayanan::find()
               ->joinWith(['user', 'jenis', 'wilayah', 'review', 'tempat'])
               ->where(['jenis.category' => 'pelayanan']);

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
            // 'id_review' => $this->id_review,
            // 'id_tempat' => $this->id_tempat,
            'approve' => $this->approve,
        ]);

        $query->andFilterWhere(['like', 'jenis.value', $this->id_jenis])
              ->andFilterWhere(['like', 'wilayah.kota', $this->id_wilayah])
              ->andFilterWhere(['like', 'review.value', $this->id_review])
              ->andFilterWhere(['like', 'tempat.value', $this->id_tempat]);

        return $dataProvider;
    }
}

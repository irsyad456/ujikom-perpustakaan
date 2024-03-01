<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UlasanBuku;

/**
 * UlasanBukuSearch represents the model behind the search form of `app\models\UlasanBuku`.
 */
class UlasanBukuSearch extends UlasanBuku
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rating'], 'integer'],
            [['ulasan', 'user_id', 'buku_id'], 'safe'],
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
        $query = UlasanBuku::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->joinWith('user');
        $query->joinWith('buku');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'ulasan', $this->ulasan])
            ->andFilterWhere(['like', 'buku.judul', $this->buku_id])
            ->andFilterWhere(['like', 'user.nama', $this->user_id]);

        return $dataProvider;
    }
}

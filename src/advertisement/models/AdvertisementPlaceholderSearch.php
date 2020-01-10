<?php

namespace ant\advertisement\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ant\advertisement\models\AdvertisementPlaceholder;

/**
 * AdvertisementPlaceholderSearch represents the model behind the search form of `ant\advertisement\models\AdvertisementPlaceholder`.
 */
class AdvertisementPlaceholderSearch extends AdvertisementPlaceholder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name', 'handle', 'setting'], 'safe'],
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
        $query = AdvertisementPlaceholder::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'handle', $this->handle])
            ->andFilterWhere(['like', 'setting', $this->setting]);

        return $dataProvider;
    }
}

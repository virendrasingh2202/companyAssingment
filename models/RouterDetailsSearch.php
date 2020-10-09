<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RouterDetails;

/**
 * RouterDetailsSearch represents the model behind the search form of `app\models\RouterDetails`.
 */
class RouterDetailsSearch extends RouterDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by'], 'integer'],
            [['sapid', 'hostname', 'loopback', 'mac_address'], 'safe']
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
        $query = RouterDetails::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
            'pagination' => [
                 'pageSize' => 5, 
            ],
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
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'is_active' => 1,
        ]);

        $query->andFilterWhere(['like', 'sapid', trim($this->sapid)])
            ->andFilterWhere(['like', 'hostname', trim($this->hostname)])
            ->andFilterWhere(['like', 'loopback', trim($this->loopback)])
            ->andFilterWhere(['like', 'mac_address', trim($this->mac_address)]);

        return $dataProvider;
    }
}

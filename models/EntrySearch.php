<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entry;

/**
 * EntrySearch represents the model behind the search form of `app\models\Entry`.
 */
class EntrySearch extends Entry
{
    public $trainingsTitle;
    public $username;
    
    /**
     * {@inheritdoc}
     */
     
    
    public function rules()
    {
        return [

            [['id', 'user', 'training','confirm','visited'], 'integer'],
            [['trainingsTitle','username'], 'string']
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
        $query = Entry::find()->joinWith(['userData'])->joinWith(['trainingData']);

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
            'confirm' => $this->confirm,
            'visited' => $this->visited
        ]);
        
        $query->andFilterWhere(['like', 'trainings.id', $this->training]);
        
        $query->andFilterWhere(['like', 'user.username', $this->username]);

        return $dataProvider;
    }
}

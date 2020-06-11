<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Team;

/**
 * NewsSearch represents the model behind the search form of `app\models\News`.
 */
class TeamSearch extends Team
{
    public $name;
    
    /**
     * {@inheritdoc}
     */
     
    
    public function rules()
    {
        return [

            [['id'], 'integer'],
            [['name'], 'string'],
            [['photo'], 'safe'],
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
        $query = Team::find()->joinWith(['teamInfos']);

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
            'team_info.lang' => 2
        ]);

        $query->andFilterWhere(['like', 'photo', $this->photo]);
        
        $query->andFilterWhere(['like', 'team_info.name', $this->name]);

        return $dataProvider;
    }
}

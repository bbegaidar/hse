<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trainings;

/**
 * TrainingsSearch represents the model behind the search form of `app\models\Trainings`.
 */
class TrainingsSearch extends Trainings
{
    public $trainingCategory;
    public $trainingTest;
    
    /**
     * {@inheritdoc}
     */
     
    
    public function rules()
    {
        return [

            [['id', 'category','test'], 'integer'],
            [['title', 'trainingCategory', 'trainingTest'], 'string'],
            [['startDate', 'endDate', 'startTime', 'endTime'], 'safe'],
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
        $query = Trainings::find()->joinWith(['categoryData'])->joinWith(['testData']);

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
            'id' => $this->title,
            'startDate' => $this->startDate
        ]);
        
        $query->andFilterWhere(['like', 'test.id', $this->trainingTest]);
        
        $query->andFilterWhere(['like', 'trainings_category.id', $this->trainingCategory]);

        return $dataProvider;
    }
}

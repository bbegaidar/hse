<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TestQuestion;

/**
 * TestQuestionSearch represents the model behind the search form of `app\models\TestQuestion`.
 */
class TestQuestionSearch extends TestQuestion
{
    public $testName;
    
    /**
     * {@inheritdoc}
     */
     
    
    public function rules()
    {
        return [

            [['id', 'type', 'test'], 'integer'],
            [['question','testName'], 'string']
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
        $query = TestQuestion::find()->joinWith(['testData']);

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
            'question' => $this->question,
            'type' => $this->type,
        ]);
        
        $query->andFilterWhere(['like', 'test.id', $this->testName]);

        return $dataProvider;
    }
}

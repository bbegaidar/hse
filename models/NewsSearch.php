<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\News;

/**
 * NewsSearch represents the model behind the search form of `app\models\News`.
 */
class NewsSearch extends News
{
    public $newsTitle;
    
    /**
     * {@inheritdoc}
     */
     
    
    public function rules()
    {
        return [

            [['id', 'category'], 'integer'],
            [['newsTitle'], 'string'],
            [['photo', 'date'], 'safe'],
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
        $query = News::find()->joinWith(['newsContents']);

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
            'category' => $this->category,
            'date' => $this->date,
            'news_content.lang' => 2
        ]);

        $query->andFilterWhere(['like', 'photo', $this->photo]);
        
        $query->andFilterWhere(['like', 'news_content.title', $this->newsTitle]);

        return $dataProvider;
    }
}

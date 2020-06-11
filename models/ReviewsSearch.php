<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reviews;

/**
 * ReviewsSearch represents the model behind the search form of `app\models\Reviews`.
 */
class ReviewsSearch extends Reviews
{
    public $reviewerName;
    public $reviewContent;
    
    /**
     * {@inheritdoc}
     */
     
    
    public function rules()
    {
        return [

            [['id', 'category'], 'integer'],
            [['reviewContent', 'reviewerName'], 'string']
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
        $query = Reviews::find()->joinWith(['reviewsContents']);

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
            'reviews_content.lang' => 2
        ]);

        $query->andFilterWhere(['like', 'reviews_content.reviewer', $this->reviewerName]);
        
        $query->andFilterWhere(['like', 'reviews_content.review', $this->reviewContent]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Photogallery;

/**
 * PhotogallerySearch represents the model behind the search form of `app\models\Photogallery`.
 */
class PhotogallerySearch extends Photogallery
{
    public $newsTitle;
    
    /**
     * {@inheritdoc}
     */
     
    
    public function rules()
    {
        return [

            [['id', 'active', 'category_id'], 'integer'],
            [['title'], 'string'],
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
        $query = Photogallery::find();

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
            'title' => $this->title,
            'active' => $this->active,
            'category_id' => $this->category_id
        ]);

        return $dataProvider;
    }
}

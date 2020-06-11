<?php

namespace app\models;

use app\models\RecordVideoLesson;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RecordVideoLesson represents the model behind the search form of `app\models\RecordVideoLesson`.
 */
class RecordVideoLessonSearch extends RecordVideoLesson
{
    public $videoName;
    public $username;

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [

            [['id', 'user_id', 'video_category_id', 'confirm', 'viewed'], 'integer'],
            [['videoName', 'username'], 'string'],
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
        $query = RecordVideoLesson::find()->joinWith(['user'])->joinWith(['videoCategory']);

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
            'viewed' => $this->viewed,
        ]);

        $query->andFilterWhere(['like', 'video_category_id.id', $this->videoName]);

        $query->andFilterWhere(['like', 'user_id.username', $this->username]);

        return $dataProvider;
    }
}

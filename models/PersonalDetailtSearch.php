<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonalDetail;

/**
 * PersonalDetailtSearch represents the model behind the search form about `app\models\PersonalDetail`.
 */
class PersonalDetailtSearch extends PersonalDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_id'], 'integer'],
            [['p_name', 'p_nick_name', 'p_DOB', 'p_fname', 'p_pic', 'p_gender', 'p_Skill'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = PersonalDetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'p_id' => $this->p_id,
        ]);

        $query->andFilterWhere(['like', 'p_name', $this->p_name])
            ->andFilterWhere(['like', 'p_nick_name', $this->p_nick_name])
            ->andFilterWhere(['like', 'p_DOB', $this->p_DOB])
            ->andFilterWhere(['like', 'p_fname', $this->p_fname])
            ->andFilterWhere(['like', 'p_pic', $this->p_pic])
            ->andFilterWhere(['like', 'p_gender', $this->p_gender])
            ->andFilterWhere(['like', 'p_Skill', $this->p_Skill]);

        return $dataProvider;
    }
}

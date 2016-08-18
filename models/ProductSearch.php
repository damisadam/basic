<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public $person;
    public function rules()
    {
        return [
            [['p_id'], 'integer'],
            [['p_name', 'p_price', 'p_sku', 'p_quantity','pro_id', 'person'], 'safe'],
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
        $query = Product::find();

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
            ->andFilterWhere(['like', 'p_price', $this->p_price])
            ->andFilterWhere(['like', 'p_sku', $this->p_sku])
            ->andFilterWhere(['like', 'p_quantity', $this->p_quantity]);

        return $dataProvider;
    }
}

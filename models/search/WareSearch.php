<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ware;

/**
 * WareSearch represents the model behind the search form about `app\models\Ware`.
 */
class WareSearch extends Ware
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'brand', 'sex', 'saison', 'type', 'wideness', 'upper', 'lining', 'sole', 'heel_height', 'color', 'category', 'waterproofness', 'status', 'position'], 'integer'],
            [['code'], 'safe'],
            [['init_price', 'new_price'], 'number'],
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
        $query = Ware::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
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
            'brand' => $this->brand,
            'sex' => $this->sex,
            'saison' => $this->saison,
            'type' => $this->type,
            'wideness' => $this->wideness,
            'upper' => $this->upper,
            'lining' => $this->lining,
            'sole' => $this->sole,
            'heel_height' => $this->heel_height,
            'color' => $this->color,
            'category' => $this->category,
            'init_price' => $this->init_price,
            'new_price' => $this->new_price,
            'waterproofness' => $this->waterproofness,
            'status' => $this->status,
            'position' => $this->position,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}

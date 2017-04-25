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

    public function searchWares($params)
    {
        $query = Ware::find();

	if (isset($params['maxprice'])) {
	  $query->andFilterWhere(['<=', 'init_price', $params['maxprice']]);
	}

	if (isset($params['sex'])) {
	  $query->andFilterWhere(['in', 'sex', $params['sex']]);
	}

	if (isset($params['color'])) {
	  $query->andFilterWhere(['in', 'color', $params['color']]);
	}
	
	if (isset($params['wideness'])) {
	  $query->andFilterWhere(['in', 'wideness', $params['wideness']]);
	}

	if (isset($params['type'])) {
	  $query->andFilterWhere(['in', 'type', $params['type']]);
	}

	if (isset($params['saison'])) {
	  $query->andFilterWhere(['in', 'saison', $params['saison']]);
	}

	if (isset($params['category'])) {
	  $query->andFilterWhere(['in', 'category', $params['category']]);
	}

	if (isset($params['upper'])) {
	  $query->andFilterWhere(['in', 'upper', $params['upper']]);
	}

	if (isset($params['lining'])) {
	  $query->andFilterWhere(['in', 'lining', $params['lining']]);
	}

	if (isset($params['sole'])) {
	  $query->andFilterWhere(['in', 'sole', $params['sole']]);
	}

	if (isset($params['heel_height'])) {
	  $query->andFilterWhere(['in', 'heel_height', $params['heel_height']]);
	}

	if (isset($params['waterproofness'])) {
	  $query->andFilterWhere(['in', 'waterproofness', $params['waterproofness']]);
	}

	if (isset($params['brand'])) {
	  $query->andFilterWhere(['in', 'brand', $params['brand']]);
	}

	if (isset($params['sizes']) && is_array($params['sizes'])) {
	  $filter = ['or'];
	  foreach($params['sizes'] as $size) {
	    $searchSize = '"' . $size . '"';
	    array_push($filter, ['like', 'sizes', (string)$searchSize]);
	  }
	  $query->andFilterWhere($filter);
	}

	$result = $query->all();
	
        return $result;
    }
}

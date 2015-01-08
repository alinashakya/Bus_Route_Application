<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bus;

/**
 * BusSearch represents the model behind the search form about `app\models\Bus`.
 */
class BusSearch extends Bus
{

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['id'], 'integer'],
				[['name', 'createdDate'], 'safe'],
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
		$query = Bus::find();

		$dataProvider = new ActiveDataProvider([
				'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
				'id'					 => $this->id,
				'createdDate'	 => $this->createdDate,
		]);

		$query->andFilterWhere(['like', 'name', $this->name]);

		return $dataProvider;
	}

}

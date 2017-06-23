<?php

namespace backend\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Manager as ManagerModel;

/**
 * ManagerSearch represents the model behind the search form about `backend\models\Manager`.
 */
class Manager extends ManagerModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['mobile', 'email', 'status'], 'safe'],
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
        $query = Manager::find()->orderBy('id DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['name', 'login_num', 'create_time', 'last_time', 'status']],
        ]);

        if (!($this->load($params) || !$this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}

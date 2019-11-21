<?php

namespace frontend\modules\contacts\models;

use common\classes\Debug;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Contacts;

/**
 * ContactsSearch represents the model behind the search form of `backend\modules\contacts\models\Contacts`.
 */
class ContactsSearch extends Contacts
{
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return array
     */
    public function search($params)
    {
        $query = Contacts::find();

        // add conditions that should always apply here

        $this->load($params);
        Debug::dd($this);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'source_id' => $this->source_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $query->asArray()->all();
    }
}

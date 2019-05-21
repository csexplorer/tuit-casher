<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Oqituvchilar;

/**
 * OqituvchilarSearch represents the model behind the search form of `app\models\Oqituvchilar`.
 */
class OqituvchilarSearch extends Oqituvchilar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ismi', 'fani', 'fakultet_id', 'kafedra_id', 'darajasi', 'familiyasi', 'otasining_ismi'], 'safe'],
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
    public function search($params, $kafedra_id, $daraja_id)
    {
        $query = Oqituvchilar::find()->with('oqituvchiUstamalaris');
        
        if (!empty($kafedra_id) && !empty($daraja_id))
        {
            $query->where([
                'kafedra_id' => $kafedra_id,
                'darajasi' => $daraja_id
            ]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->joinWith('oqituvchiUstamalaris'),
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
        ]);
        
        $query->joinWith('fakultet');
        $query->joinWith('kafedra');
        $query->joinWith('darajasi0');

        $query->andFilterWhere(['like', 'concat(familiyasi, " ", ismi, " ", otasining_ismi)', $this->ismi])
              ->andFilterWhere(['like', 'fakultetlar.nomi', $this->fakultet_id])
              ->andFilterWhere(['like', 'kafedralar.nomi', $this->kafedra_id])
              ->andFilterWhere(['like', 'darajalar.nomi', $this->darajasi]);

        return $dataProvider;
    }
}

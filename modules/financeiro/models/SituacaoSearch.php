<?php

namespace app\modules\financeiro\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\financeiro\models\Situacao;

class SituacaoSearch extends Situacao
{
    
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['situacao'], 'safe'],
        ];
    }

    
    public function scenarios()
    {
        
        return Model::scenarios();
    }

    
    public function search($params)
    {
        $query = Situacao::find();

        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            
            return $dataProvider;
        }

        
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['ilike', 'situacao', $this->situacao]);

        return $dataProvider;
    }
}

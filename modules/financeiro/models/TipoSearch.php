<?php

namespace app\modules\financeiro\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\financeiro\models\Tipo;


class TipoSearch extends Tipo
{
   
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tipo'], 'safe'],
        ];
    }

    
    public function scenarios()
    {
        
        return Model::scenarios();
    }

    
    public function search($params)
    {
        $query = Tipo::find();

        

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

        $query->andFilterWhere(['ilike', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}

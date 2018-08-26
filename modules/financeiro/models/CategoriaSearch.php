<?php

namespace app\modules\financeiro\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\financeiro\models\Categoria;

class CategoriaSearch extends Categoria
{
    
    public function rules()
    {
        return [
            [['id', 'id_tipo'], 'integer'],
            [['categoria'], 'safe'],
        ];
    }

   
    public function scenarios()
    {
        
        return Model::scenarios();
    }

    
    public function search($params)
    {
        $query = Categoria::find();

        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            
            return $dataProvider;
        }

       
        $query->andFilterWhere([
            'id' => $this->id,
            'id_tipo' => $this->id_tipo,
        ]);

        $query->andFilterWhere(['ilike', 'categoria', $this->categoria]);

        return $dataProvider;
    }
}

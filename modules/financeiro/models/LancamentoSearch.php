<?php

namespace app\modules\financeiro\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\financeiro\models\Lancamento;


class LancamentoSearch extends Lancamento
{
    

    public function rules()
    {
        return [
            [['id', 'valor', 'id_categoria', 'id_situacao', 'id_tipo'], 'integer'],
            [['descricao', 'validade', 'categoria', 'tipo', 'situacao'], 'safe'],
        ];
    }

    
    public function scenarios()
    {
        return Model::scenarios();
    }

    
    public function search($params)
    {
        $query = Lancamento::find();
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],            
        ]);
        
      

        $this->load($params);

        if (!$this->validate()) {
            
            return $dataProvider;
        }

        
        $query->andFilterWhere([
            'id' => $this->id,
            'valor' => $this->valor,
            'id_categoria' => $this->id_categoria,
            'validade' => $this->validade,
            'id_situacao' => $this->id_situacao,
            'id_tipo' => $this->id_tipo,
        ]);
        
        
        

        $query->andFilterWhere(['ilike', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}

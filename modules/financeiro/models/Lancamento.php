<?php

namespace app\modules\financeiro\models;

use Yii;


class Lancamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lancamento';
    }

    
    public function rules()
    {
        return [
            [['descricao', 'valor', 'validade', 'id_categoria', 'id_situacao', 'id_tipo'], 'required'],
            [['valor'], 'default', 'value' => null],
            [['valor'], 'integer'],
            [['validade'], 'date', 'format' => 'dd/MM/yyyy'],
            [['descricao'], 'string', 'max' => 50],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
            [['id_situacao'], 'exist', 'skipOnError' => true, 'targetClass' => Situacao::className(), 'targetAttribute' => ['id_situacao' => 'id']],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['id_tipo' => 'id']],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'valor' => 'Valor',
            'id_categoria' => 'Id Categoria',
            'validade' => 'Validade',
            'id_categoria' => 'Categoria',
            'id_situacao' => 'Situação',
            'id_tipo' => 'Tipo',
        ];
    }

   
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }

   
    public function getSituacao()
    {
        return $this->hasOne(Situacao::className(), ['id' => 'id_situacao']);
    }

    
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id' => 'id_tipo']);
    }
}

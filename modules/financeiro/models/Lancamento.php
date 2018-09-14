<?php

namespace app\modules\financeiro\models;

use Yii;


class Lancamento extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'lancamento';
    }


    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['descricao', 'valor', 'validade'], 'required'],
            [['valor'], 'double'],
            [['validade'], 'date', 'format' => 'dd/MM/yyyy'],
            [['descricao'], 'string', 'max' => 50],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['id_tipo' => 'id']],
            [['situacao'], 'default', 'value' => 0],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'valor' => 'Valor',
            'validade' => 'Validade',
            'id_tipo' => 'Tipo',
            'id_categoria' => 'Categoria',
            'situacao' => 'Situacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id' => 'id_tipo']);
    }
}

<?php

namespace app\modules\financeiro\models;

use Yii;

class Categoria extends \yii\db\ActiveRecord
{
   
    public static function tableName()
    {
        return 'categoria';
    }

   
    public function rules()
    {
        return [
            [['categoria', 'id_tipo'], 'required'],
            [['id_tipo'], 'default', 'value' => null],
            [['id_tipo'], 'integer'],
            [['categoria'], 'string', 'max' => 100],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['id_tipo' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria' => 'Categoria',
            'id_tipo' => 'Tipo',
        ];
    }

    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id' => 'id_tipo']);
    }

    public function getLancamentos()
    {
        return $this->hasMany(Lancamento::className(), ['id_categoria' => 'id']);
    }
}

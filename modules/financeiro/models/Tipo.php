<?php

namespace app\modules\financeiro\models;

use Yii;


class Tipo extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'tipo';
    }

   
    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [['tipo'], 'string', 'max' => 50],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
        ];
    }

   
    public function getCategorias()
    {
        return $this->hasMany(Categoria::className(), ['id_tipo' => 'id']);
    }

    
    public function getLancamentos()
    {
        return $this->hasMany(Lancamento::className(), ['id_tipo' => 'id']);
    }
}

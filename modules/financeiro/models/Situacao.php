<?php

namespace app\modules\financeiro\models;

use Yii;


class Situacao extends \yii\db\ActiveRecord
{
   
    public static function tableName()
    {
        return 'situacao';
    }

    
    public function rules()
    {
        return [
            [['situacao'], 'required'],
            [['situacao'], 'string', 'max' => 50],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'situacao' => 'Situacao',
        ];
    }

    
    public function getLancamentos()
    {
        return $this->hasMany(Lancamento::className(), ['id_situacao' => 'id']);
    }
}

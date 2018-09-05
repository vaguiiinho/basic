<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\financeiro\models\LancamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lancamento-index">

    <h1><?= Html::encode($this->title) ?></h1>
       <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
            'descricao',
            'valor',           
            'validade',
            [                            
                'attribute' => 'categoria',                
                'value' => 'categoria.categoria',
                 'headerOptions' => [
                    'style' => 'color: #0083bb;'
                ],   
                    
            ],            
            
            [
                'attribute' => 'tipo',                
                'value' => 'tipo.tipo',
                'headerOptions' => [
                    'style' => 'color: #0083bb;'
                ],
            ],
            
            [
                'attribute' => 'situacao',
                'value' => 'situacao.situacao',
                'headerOptions' => [
                    'style' => 'color: #0083bb;'
                ],
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}' ],           
        ],
    ]); ?>
</div>

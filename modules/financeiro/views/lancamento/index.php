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
        'columns' => [
            'descricao',
            [
            'attribute' => 'valor',
            'format' => 'currency',
            ],
            [
                'attribute' => 'validade',
                'format'=> 'date',            
            ], 
            [                            
                'attribute' => 'id_categoria',                
                'value' => 'categoria.categoria',                
            ],                                 
            [
                'attribute' => 'id_tipo',                
                'value' => 'tipo.tipo',            
            ],
            [
                'attribute' => 'situacao',
                'content' => function($model, $id){
                    if($model->situacao){
                        return Html::a('Pendente', [
                            'situacao',
                            'id' => $model->id],
                            ['class' => 'label label-warning']);
                    }
                    return Html::a('Paga', [
                        'situacao',
                        'id' => $model->id],
                        ['class' => 'label label-success']);
                },
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}']
        ],
    ]); ?>
</div>

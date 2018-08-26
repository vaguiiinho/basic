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
            ['class' => 'yii\grid\SerialColumn'],
            'descricao',
            'valor',           
            'validade',
            'id_categoria',            
            'id_tipo',
            'id_situacao',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}' ],           
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\financeiro\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>    
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'categoria',
            [
                'attribute' => 'id_tipo',
                'value' => 'tipo.tipo',
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
            ],
        ]); 
        ?>
</div>

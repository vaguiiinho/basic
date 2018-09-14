<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\financeiro\models\TipoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-index">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'tipo',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
</div>

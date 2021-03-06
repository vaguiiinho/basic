<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\financeiro\models\Lancamento */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lancamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lancamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'descricao',
            'valor:currency',
            [
                'attribute' => 'id_categoria',
                'value' => function($model){
                    return $model->categoria->categoria;
                },
            ],
            'validade',
            [
                'attribute' => 'id_tipo',
                'value' => function($model){
                    return $model->tipo->tipo;
                },
            ],
            'situacao',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\financeiro\models\Lancamento;


/* @var $this yii\web\View */
/* @var $model app\modules\financeiro\models\Lancamento */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Contas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="lancamento-form">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(); ?>                

                <?= $form->field($model, 'descricao')->textInput() ?>

                <?= $form->field($model, 'valor')->textInput() ?>
                
                <?= $form->field($model, 'validade')->textInput() ?>

                <?= $form->field($model, 'id_categoria')->dropDownList($categoriasOpts, ['prompt'=>'']) ?>

                <!-- <?= $form->field($model, 'id_tipo')->dropDownList($tiposOpts, ['prompt'=>'']) ?>

                <?= $form->field($model, 'id_situacao')->dropDownList($situacaoOpts, ['prompt'=>'']) ?>-->

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

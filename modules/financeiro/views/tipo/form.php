<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\financeiro\models\Tipo */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Novo Tipo';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="tipo-form">
    
    <div class="situacao-form">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
     </div>
</div>

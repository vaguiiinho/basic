<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\financeiro\models\Situacao */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Situação';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="situacao-form">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'situacao')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
     </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\financeiro\models\Categoria */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="categoria-form">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

                 <?= $form->field($model, 'id_tipo')->dropDownList($itemTipo, ['prompt'=>'']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

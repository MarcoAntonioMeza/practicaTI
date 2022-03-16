<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\inicioSesion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inicio-sesion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contraseña')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_persona')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

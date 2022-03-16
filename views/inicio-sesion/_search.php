<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InicioSesionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inicio-sesion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idinicioSesion') ?>

    <?= $form->field($model, 'correo') ?>

    <?= $form->field($model, 'contraseña') ?>

    <?= $form->field($model, 'id_persona') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

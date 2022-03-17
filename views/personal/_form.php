<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*********NECESARIO PARA SELECCIONAR LA CARGO  ********/
use yii\helpers\ArrayHelper;  //Consulta BD
use app\models\Cargo;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'grado')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'Nombre')->textInput() ?>

    <?= $form->field($model, 'Apellidos')->textInput() ?>   


    <?php    
        $cargo = ArrayHelper::map(Cargo::find()->all(), 'idcargo', 'nombre');
        echo $form->field($model, 'id_cargo')->dropDownList($cargo,['prompt'=>'--Seleccione  cargo--']); 
    ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

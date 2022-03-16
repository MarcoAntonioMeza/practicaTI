<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'Nombre')->textInput() ?>
    <?= $form->field($model, 'Apellidos')->textInput() ?>
    <?php    
        $carrera = ArrayHelper::map(Estudiante::find()->all(), 'id', 'GradoGrupo');
        echo $form->field($model, 'id_carrera')->dropDownList($carrera,['prompt'=>'Seleccione la carrera']); 
    ?>  



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

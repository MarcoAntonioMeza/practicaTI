<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*********NECESARIO PARA SELECCIONAR LA CARGO  ********/
use yii\helpers\ArrayHelper;  //Consulta BD
use app\models\Grupo;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?php //echo  $form->field($model, 'id_persona')->textInput() ?>

    <?php //echo $form->field($model, 'id_grupo')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput() ?>

    <?= $form->field($model, 'Apellidos')->textInput() ?> 

    <?php    
        $grupo = ArrayHelper::map(Grupo::find()->all(), 'idgrupo', 'NombreCompletoGrupo');
        echo $form->field($model, 'id_grupo')->dropDownList($grupo,['prompt'=>'-Seleccione  grupo-']); 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/*********NECESARIO PARA SELECCIONAR LA CARGO  ********/
use yii\helpers\ArrayHelper;  //Consulta BD
use app\models\Personal;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'grado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grupo')->textInput(['maxlength' => true]) ?>

    <?php    
        $tutor = ArrayHelper::map(Personal::find()->all(), 'idpersonal', 'NombreCompleto');
        echo $form->field($model, 'id_tutor')->dropDownList($tutor,['prompt'=>'Seleccione al tutor']); 
    ?>  

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

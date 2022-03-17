<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*********NECESARIO PARA SELECCIONAR LA CARGO  ********/
use yii\helpers\ArrayHelper;  //Consulta BD
use app\models\cargo;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--Formiulario para filtrar-->

<div class="form-group">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center lead">
            <p><b>Filtrar personal por: </b> </p>
        </div>
        <div class="col-md-3"></div>
    </div>
        <div class="row">
            <div class="col-md-5">
            <?= $form->field($model, 'nombre') ?>
            </div>
            <div class="col-md-5">
                <?php    
                    $cargo = ArrayHelper::map(Cargo::find()->all(), 'idcargo', 'nombre');
                    echo $form->field($model, 'id_cargo')->dropDownList($cargo,['prompt'=>'Seleccione el cargo']); 
                    //= $form->field($model, 'id_cargo') 
                ?>
            </div>
            <div class="col-md-2 text-center">
                
                
                <?= Html::submitButton('Filtrar', ['class' => 'btn btn-info']) ?>
            </div>
        </div>    
        <?php //= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>

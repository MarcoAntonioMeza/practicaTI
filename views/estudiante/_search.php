<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/*********NECESARIO PARA SELECCIONAR LA CARGO  ********/
use yii\helpers\ArrayHelper;  //Consulta BD
use app\models\Grupo;
/* @var $this yii\web\View */
/* @var $model app\models\EstudianteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'idestudiante') ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'matricula') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'nombre') ?>
        </div>
        <div class="col-md-4 text-center">
            <div class="form-group">
                <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
                <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
            </div>
        </div>
    </div>

    
    <?php /*   
        $grupo= ArrayHelper::map(Grupo::find()->all(), 'idgrupo', 'nombreCompletoGrupo');
        echo $form->field($model, 'id_grupo')->dropDownList($grupo,['prompt'=>'Seleccione grupo']); 
                    //= $form->field($model, 'id_cargo') */
    ?>
    

    <?php // $form->field($model, 'id_persona') ?>

    <?php // echo  $form->field($model, 'id_grupo') ?>




    <?php ActiveForm::end(); ?>

</div>

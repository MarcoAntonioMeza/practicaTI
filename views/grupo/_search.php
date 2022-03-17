<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;  //Consulta BD
use app\models\Personal;

/* @var $this yii\web\View */
/* @var $model app\models\GrupoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // echo $form->field($model, 'idgrupo') ?>

    <?php // $form->field($model, 'grado') ?>

    <?php // $form->field($model, 'grupo') ?>

    <?php //echo $form->field($model, 'id_tutor') ?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center lead">
            <p><b>Filtrar grupo por: </b> </p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php echo $form->field($model, 'grado') ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'grupo') ?>
        </div>
        <div class="col-md-3">
        <?php        
        $cargo = ArrayHelper::map(Personal::find()->all(), 'idpersonal', 'nombreCompleto');
        echo $form->field($model, 'id_tutor')->dropDownList($cargo,['prompt'=>'Seleccione tutor']); 
        //= $form->field($model, 'id_cargo') 
    ?>
        </div>
        <div class="col-md-3 text-center">
        <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>

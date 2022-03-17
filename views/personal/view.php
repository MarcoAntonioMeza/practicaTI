<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */

$this->title = $model->NombreCompleto;
$this->params['breadcrumbs'][] = ['label' => 'Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="personal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'idpersonal' => $model->idpersonal, 'id_persona' => $model->id_persona, 'id_cargo' => $model->id_cargo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'idpersonal' => $model->idpersonal, 'id_persona' => $model->id_persona, 'id_cargo' => $model->id_cargo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // atributos para mostar informacion de cada un usuario(personaL)
            ['attribute' => 'Nombre', 'value' =>  $model->grado." ".$model->getNombreCompleto() ],
            ['attribute' => 'Grado', 'value' =>  $model->grado ],
            ['attribute' => 'Cargo', 'value' =>  $model->getNombreCargo() ],
            
            //['attribute' => 'Carrera', 'value' =>  $model->getNombreCarrera() ],
            //'idpersonal',
            //'grado',
            //'id_persona',
            //'id_cargo',
        ],
    ]) ?>

</div>

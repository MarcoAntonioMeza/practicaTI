<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */

$this->title = $model->NombreCompleto;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estudiante-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'idestudiante' => $model->idestudiante, 'id_persona' => $model->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'idestudiante' => $model->idestudiante, 'id_persona' => $model->id_persona], [
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
            //'idestudiante',
            'matricula',
            ['attribute' => 'Nombre', 'value' =>  $model->getNombreCompleto() ],
            ['attribute' => 'Grupo', 'value' =>  $model->getNombreGRupo() ],
            
            //'id_persona',
            //'id_grupo',
        ],
    ]) ?>

</div>

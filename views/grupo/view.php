<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */

$this->title = $model->NombreCompletoGrupo;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="grupo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'idgrupo' => $model->idgrupo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eleiminar', ['delete', 'idgrupo' => $model->idgrupo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de que quu quieres eliminar este grupo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idgrupo',
            //'grado',
            //'grupo',
            //'id_tutor',
            ['attribute'=>'Tutor', 'value'=>$model->getNombreTutor()],
            ['attribute'=>'Grupo', 'value'=>$model->getNombreCompletoGrupo()],
        ],
    ]) ?>

</div>

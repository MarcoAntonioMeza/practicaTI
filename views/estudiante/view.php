<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */

$this->title = $model->idestudiante;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estudiante-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idestudiante' => $model->idestudiante, 'id_persona' => $model->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idestudiante' => $model->idestudiante, 'id_persona' => $model->id_persona], [
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
            //'id_persona',
            //'id_grupo',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\inicioSesion */

$this->title = $model->idinicioSesion;
$this->params['breadcrumbs'][] = ['label' => 'Inicio Sesions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inicio-sesion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idinicioSesion' => $model->idinicioSesion, 'id_persona' => $model->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idinicioSesion' => $model->idinicioSesion, 'id_persona' => $model->id_persona], [
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
            'idinicioSesion',
            'correo',
            'contraseña',
            'id_persona',
        ],
    ]) ?>

</div>

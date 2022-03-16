<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Temperatura */

$this->title = $model->idtemperatura;
$this->params['breadcrumbs'][] = ['label' => 'Temperaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="temperatura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idtemperatura' => $model->idtemperatura, 'temperatura' => $model->temperatura, 'fecha' => $model->fecha, 'id_persona' => $model->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idtemperatura' => $model->idtemperatura, 'temperatura' => $model->temperatura, 'fecha' => $model->fecha, 'id_persona' => $model->id_persona], [
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
            'idtemperatura',
            'temperatura',
            'fecha',
            'id_persona',
        ],
    ]) ?>

</div>

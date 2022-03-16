<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */

$this->title = $model->idpersonal;
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="personal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idpersonal' => $model->idpersonal, 'id_persona' => $model->id_persona, 'id_cargo' => $model->id_cargo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idpersonal' => $model->idpersonal, 'id_persona' => $model->id_persona, 'id_cargo' => $model->id_cargo], [
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
            'idpersonal',
            'grado',
            'id_persona',
            'id_cargo',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TemperaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Temperaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="temperatura-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Temperatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtemperatura',
            'temperatura',
            'fecha',
            'id_persona',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idtemperatura' => $model->idtemperatura, 'temperatura' => $model->temperatura, 'fecha' => $model->fecha, 'id_persona' => $model->id_persona]);
                 }
            ],
        ],
    ]); ?>


</div>

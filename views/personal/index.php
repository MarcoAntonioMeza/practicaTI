<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //oculta los filtros en la tabla |
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idpersonal',
            //'grado',
            //'id_persona',
            //'id_cargo',
            ['attribute' => 'Nombre', 'value' =>  'NombreCompleto' ],
            ['attribute' => 'Cargo', 'value' =>  'NombreCargo' ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idpersonal' => $model->idpersonal, 'id_persona' => $model->id_persona, 'id_cargo' => $model->id_cargo]);
                 }
            ],
        ],
    ]); ?>


</div>

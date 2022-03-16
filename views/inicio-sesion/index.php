<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InicioSesionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inicio Sesions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inicio-sesion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Inicio Sesion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idinicioSesion',
            'correo',
            'contraseña',
            'id_persona',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,   $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idinicioSesion' => $model->idinicioSesion, 'id_persona' => $model->id_persona]);
                 }
            ],
        ],
    ]); ?>


</div>

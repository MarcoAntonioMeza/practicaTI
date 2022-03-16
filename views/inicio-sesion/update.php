<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\inicioSesion */

$this->title = 'Update Inicio Sesion: ' . $model->idinicioSesion;
$this->params['breadcrumbs'][] = ['label' => 'Inicio Sesions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idinicioSesion, 'url' => ['view', 'idinicioSesion' => $model->idinicioSesion, 'id_persona' => $model->id_persona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inicio-sesion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

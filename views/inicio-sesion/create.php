<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\inicioSesion */

$this->title = 'Create Inicio Sesion';
$this->params['breadcrumbs'][] = ['label' => 'Inicio Sesions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inicio-sesion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

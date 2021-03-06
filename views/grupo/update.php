<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */

$this->title = 'Actualizar grupo: ' . $model->NombreCompletoGrupo;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NombreCompletoGrupo, 'url' => ['view', 'idgrupo' => $model->idgrupo]];
$this->params['breadcrumbs'][] = 'Actualizar grupo';
?>
<div class="grupo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

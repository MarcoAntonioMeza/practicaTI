<?php

namespace app\controllers;

use app\models\Temperatura;
use app\models\TemperaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TemperaturaController implements the CRUD actions for Temperatura model.
 */
class TemperaturaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Temperatura models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TemperaturaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Temperatura model.
     * @param int $idtemperatura ID
     * @param string $temperatura Temperatura
     * @param string $fecha Fecha
     * @param int $id_persona Id Persona
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtemperatura, $temperatura, $fecha, $id_persona)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtemperatura, $temperatura, $fecha, $id_persona),
        ]);
    }

    /**
     * Creates a new Temperatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Temperatura();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtemperatura' => $model->idtemperatura, 'temperatura' => $model->temperatura, 'fecha' => $model->fecha, 'id_persona' => $model->id_persona]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Temperatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtemperatura ID
     * @param string $temperatura Temperatura
     * @param string $fecha Fecha
     * @param int $id_persona Id Persona
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtemperatura, $temperatura, $fecha, $id_persona)
    {
        $model = $this->findModel($idtemperatura, $temperatura, $fecha, $id_persona);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtemperatura' => $model->idtemperatura, 'temperatura' => $model->temperatura, 'fecha' => $model->fecha, 'id_persona' => $model->id_persona]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Temperatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtemperatura ID
     * @param string $temperatura Temperatura
     * @param string $fecha Fecha
     * @param int $id_persona Id Persona
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtemperatura, $temperatura, $fecha, $id_persona)
    {
        $this->findModel($idtemperatura, $temperatura, $fecha, $id_persona)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Temperatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtemperatura ID
     * @param string $temperatura Temperatura
     * @param string $fecha Fecha
     * @param int $id_persona Id Persona
     * @return Temperatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtemperatura, $temperatura, $fecha, $id_persona)
    {
        if (($model = Temperatura::findOne(['idtemperatura' => $idtemperatura, 'temperatura' => $temperatura, 'fecha' => $fecha, 'id_persona' => $id_persona])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

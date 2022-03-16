<?php

namespace app\controllers;

use app\models\inicioSesion;
use app\models\InicioSesionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InicioSesionController implements the CRUD actions for inicioSesion model.
 */
class InicioSesionController extends Controller
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
     * Lists all inicioSesion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InicioSesionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single inicioSesion model.
     * @param int $idinicioSesion Idinicio Sesion
     * @param int $id_persona Id Persona
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idinicioSesion, $id_persona)
    {
        return $this->render('view', [
            'model' => $this->findModel($idinicioSesion, $id_persona),
        ]);
    }

    /**
     * Creates a new inicioSesion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new inicioSesion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idinicioSesion' => $model->idinicioSesion, 'id_persona' => $model->id_persona]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing inicioSesion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idinicioSesion Idinicio Sesion
     * @param int $id_persona Id Persona
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idinicioSesion, $id_persona)
    {
        $model = $this->findModel($idinicioSesion, $id_persona);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idinicioSesion' => $model->idinicioSesion, 'id_persona' => $model->id_persona]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing inicioSesion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idinicioSesion Idinicio Sesion
     * @param int $id_persona Id Persona
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idinicioSesion, $id_persona)
    {
        $this->findModel($idinicioSesion, $id_persona)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the inicioSesion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idinicioSesion Idinicio Sesion
     * @param int $id_persona Id Persona
     * @return inicioSesion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idinicioSesion, $id_persona)
    {
        if (($model = inicioSesion::findOne(['idinicioSesion' => $idinicioSesion, 'id_persona' => $id_persona])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

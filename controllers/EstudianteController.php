<?php

namespace app\controllers;

use Yii;
use app\models\Estudiante;
use app\models\EstudianteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

// referenciar
use app\models\Persona;
use app\models\PersonaSearch;
use app\models\Grupo;
use app\models\GrupoSearch;

/**
 * EstudianteController implements the CRUD actions for Estudiante model.
 */
class EstudianteController extends Controller
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
     * Lists all Estudiante models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EstudianteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estudiante model.
     * @param int $idestudiante Idestudiante
     * @param int $id_persona Id Persona
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idestudiante, $id_persona)
    {
        return $this->render('view', [
            'model' => $this->findModel($idestudiante, $id_persona),
        ]);
    }

    /**
     * Creates a new Estudiante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Estudiante();
        $persona = new Persona();

        

        $valores = Yii::$app->request->post();
        if( isset($valores['Estudiante']) ){
            // Se integra el nombre de persona para su registro
            $valores['Persona']['nombre'] = $valores['Estudiante']['Nombre'];
        }

        if ($persona->load($valores) && $persona->save()) {
            // Se integra el id de persona para el registro del estudiante
            $valores['Estudiante']['id_persona'] = $persona->id;
            if ($model->load($valores) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);               
            } 
        }
        else {
            $model->loadDefaultValues();
        }

/*
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idestudiante' => $model->idestudiante, 'id_persona' => $model->id_persona]);
            }
        } else {
            $model->loadDefaultValues();
        }
*/
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Estudiante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idestudiante Idestudiante
     * @param int $id_persona Id Persona
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idestudiante, $id_persona)
    {
        $model = $this->findModel($idestudiante, $id_persona);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idestudiante' => $model->idestudiante, 'id_persona' => $model->id_persona]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Estudiante model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idestudiante Idestudiante
     * @param int $id_persona Id Persona
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idestudiante, $id_persona)
    {
        $this->findModel($idestudiante, $id_persona)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estudiante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idestudiante Idestudiante
     * @param int $id_persona Id Persona
     * @return Estudiante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idestudiante, $id_persona)
    {
        if (($model = Estudiante::findOne(['idestudiante' => $idestudiante, 'id_persona' => $id_persona])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

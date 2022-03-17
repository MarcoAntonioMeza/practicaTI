<?php

namespace app\controllers;

use app\models\Personal;
use app\models\PersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// Usar la clase
use Yii; 

// Referenciar al modelo persona
use app\models\Persona;
use app\models\PersonaSearch;
/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
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
     * Lists all Personal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
     * @param int $idpersonal Idpersonal
     * @param int $id_persona Id Persona
     * @param int $id_cargo Id Cargo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idpersonal, $id_persona, $id_cargo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idpersonal, $id_persona, $id_cargo),
        ]);
    }

    /**
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Personal();

        $persona = new Persona();

        $valores = Yii::$app->request->post();

        if( isset($valores['Personal']) ){
            // Se integra el nombre de persona para su registro
            $valores['Persona']['nombre'] = $valores['Personal']['Nombre'];
            $valores['Persona']['apellidos'] = $valores['Personal']['Apellidos'];
            //var_dump($valores['Persona']);
              //  return null;
        }
        
        //if ($this->request->isPost) {
           // var_dump($this->request->post());
            //return null;
            if($persona->load($valores) && $persona->save()){
                $valores['Personal']['id_persona'] = $persona->idpersona;
                if ($model->load($valores) && $model->save()) {
                    return $this->redirect(['view', 'idpersonal' => $model->idpersonal, 'id_persona' => $model->id_persona, 'id_cargo' => $model->id_cargo]);
                }
            }

        /*} else {
            $model->loadDefaultValues();
        }*/

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idpersonal Idpersonal
     * @param int $id_persona Id Persona
     * @param int $id_cargo Id Cargo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idpersonal, $id_persona, $id_cargo)
    {
        $model = $this->findModel($idpersonal, $id_persona, $id_cargo);

        //obtener el objeto del modelo persona
        $persona = $model->persona;

        //Traer los datos
        $valores = Yii::$app->request->post();

        if(isset($valores['Personal'])){
            //Creamos un array dentro del mismo con los valores que se utilizaran para cambiar a persona
            $valores['Persona']['nombre'] = $valores['Personal']['Nombre']; 
            $valores['Persona']['apellidos'] = $valores['Personal']['Apellidos']; 
        }

        if (/*$this->request->isPost && */$persona->load($valores) && $persona->save()) {
            if($model->load($valores) && $model->save()){
                return $this->redirect(['view', 'idpersonal' => $model->idpersonal, 'id_persona' => $model->id_persona, 'id_cargo' => $model->id_cargo]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Personal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idpersonal Idpersonal
     * @param int $id_persona Id Persona
     * @param int $id_cargo Id Cargo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idpersonal, $id_persona, $id_cargo)
    {
        $this->findModel($idpersonal, $id_persona, $id_cargo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idpersonal Idpersonal
     * @param int $id_persona Id Persona
     * @param int $id_cargo Id Cargo
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpersonal, $id_persona, $id_cargo)
    {
        if (($model = Personal::findOne(['idpersonal' => $idpersonal, 'id_persona' => $id_persona, 'id_cargo' => $id_cargo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

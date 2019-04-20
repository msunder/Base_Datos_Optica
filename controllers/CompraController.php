<?php

namespace app\controllers;

use Yii;
use app\models\Compra;
use app\models\CompraSearch;
use app\models\Proveedores;
use app\models\DetallecompraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Compra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compra model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Compra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Compra();
        $model->Finalizado=0;
        $model->Total = 0;
        $proveedoress = [];
        $tmp = Proveedores::find()->all();
        foreach($tmp as $proveedor){
            $proveedoress[$proveedor->ID]="Nit: ".$proveedor->NIT.";  Nombre: ".$proveedor->Nombre;

        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['creates', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
            'proveedoress'=>$proveedoress,
        ]);
    }
    public function actionCreates($id)
    {
        $idlen=0;
        $searchModel = new DetallecompraSearch();
         $searchModel->ID_Compra = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('creates', [
            'model' => $this->findModel($id),
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
            'idlen'=>$idlen,
        ]);
    }
     public function actionCreatef($id)
    {
        $model = $this->findModel($id);
        $model->Finalizado=1;
         $v1=$model->Monto_Efectivo;
        $v2=$model->Credito;
        $model->Total = $v1 + $v2;
        $proveedoress = [];
        $tmp = Proveedores::find()->all();
        foreach($tmp as $proveedor){
            $proveedoress[$proveedor->ID]="Nit: ".$proveedor->NIT.";  Nombre: ".$proveedor->Nombre;

        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('createf', [
            'model' => $model,
            'proveedoress'=>$proveedoress,
        ]);
    }


    /**
     * Updates an existing Compra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $proveedoress = [];
        $tmp = Proveedores::find()->all();
        foreach($tmp as $proveedor){
            $proveedoress[$proveedor->ID]="Nit: ".$proveedor->NIT.";  Nombre: ".$proveedor->Nombre;

        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
            'proveedoress'=>$proveedoress,
        ]);
    }

    /**
     * Deletes an existing Compra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Compra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Compra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Compra::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

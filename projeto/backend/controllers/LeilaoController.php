<?php

namespace app\controllers;
namespace backend\controllers;

use app\models\Leilao;
use app\models\LeilaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LeilaoController implements the CRUD actions for Leilao model.
 */
class LeilaoController extends Controller
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
     * Lists all Leilao models.
     * @return mixed
     */
    public function actionIndex()
    {

        $query = Leilao::find();
        $leiloes = $query->all();

        $searchModel = new LeilaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'leiloes' => $leiloes,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexap()
    {
        $query = Leilao::find();
        $leiloes = $query->all();


        $searchModel = new LeilaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('indexap', [
            'leiloes' => $leiloes,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexap()
    {
        $query = Leilao::find();
        $leiloes = $query->all();


        $searchModel = new LeilaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('indexap', [
            'leiloes' => $leiloes,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Leilao model.
     * @param int $id ID
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
     * Creates a new Leilao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Leilao();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Leilao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdateaprovado($id)
    {
        $model = $this->findModel($id);

        if ($model->aprovado == 'S'){
            \Yii::$app->db->createCommand()
                ->update('leilao', ['aprovado' => 'N'], 'id = '. $model->id)
                ->execute();
        }elseif ($model->aprovado == 'N'){
            \Yii::$app->db->createCommand()
                ->update('leilao', ['aprovado' => 'S'], 'id = '. $model->id)
                ->execute();
        }

        $query = Leilao::find();
        $leiloes = $query->all();

        $searchModel = new LeilaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('indexap', [
            'leiloes' => $leiloes,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Deletes an existing Leilao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Leilao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Leilao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Leilao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

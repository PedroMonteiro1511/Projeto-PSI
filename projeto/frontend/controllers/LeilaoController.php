<?php

namespace frontend\controllers;

use common\models\Leilao;
use common\models\LeilaoSearch;
use common\models\Oferta;
use common\models\OfertaSearch;
use common\models\VendaSearch;
use Yii;
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
            $dataProvider = $searchModel->searchTempo($this->request->queryParams);

            return $this->render('index', [
                'leiloes' => $leiloes,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }


    public function actionMvenda(){
        if (\Yii::$app->user->isGuest){
            return $this->render('index');
        }else{
            $searchModel = new LeilaoSearch();
            $dataProvider = $searchModel->searchID($this->request->queryParams);

            return $this->render('mVendas', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }




    /**
     * Displays a single Leilao model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new OfertaSearch();
        $dataProvider = $searchModel->searchOfertas($this->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Leilao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->isGuest){
            return $this->goHome();
        }else{
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

    }

    public function actionMleilao(){
        if (Yii::$app->user->isGuest){
            return $this->render('index');
        }else{
            $searchModel = new LeilaoSearch();
            $dataProvider = $searchModel->searchID($this->request->queryParams);

            return $this->render('mVendas', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
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

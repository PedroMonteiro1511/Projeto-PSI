<?php

namespace frontend\controllers;

use common\models\Venda;
use common\models\VendaSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * VendaController implements the CRUD actions for Venda model.
 */
class VendaController extends Controller
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
     * Lists all Venda models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new VendaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $query = Venda::find();
        $vendas = $query->all();

        return $this->render('index', [

            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'vendas' => $vendas,
        ]);
    }


    public function actionMvenda(){
        if (Yii::$app->user->isGuest){
            return $this->render('index');
        }else{
            $query = Venda::find();
            $vendas = $query->all();
            $searchModelVenda = new VendaSearch();
            $dataProviderVenda = $searchModelVenda->searchVenda($this->request->queryParams);

            return $this->render('mVendas', [
                'vendas' => $vendas,
                'searchModelVenda' => $searchModelVenda,
                'dataProviderVenda' => $dataProviderVenda,
            ]);
        }
    }


    public function actionError(){
        return $this->render('error');
    }

    /**
     * Displays a single Venda model.
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
     * Creates a new Venda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venda();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->imagem = UploadedFile::getInstance($model, 'imagem');
                $imagem_nome = $model->titulo.rand(1, 4000).'.'.$model->imagem->extension;
                $path = 'uploads/venda' .$imagem_nome;

                $model->imagem->saveAs($path);
                $model->imagem = $path;
                $model -> save();

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
     * Updates an existing Venda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->imagem = UploadedFile::getInstance($model, 'imagem');
            $imagem_nome = $model->titulo.rand(1, 4000).'.'.$model->imagem->extension;
            $path = 'uploads/venda' .$imagem_nome;

            $model->imagem->saveAs($path);
            $model->imagem = $path;
            $model -> save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Venda model.
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
     * Finds the Venda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Venda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

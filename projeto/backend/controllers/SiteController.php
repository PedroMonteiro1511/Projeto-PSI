<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('login-admin')){
            return $this->render('index');
        }else{
            Yii::$app->user->logout();
        }
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $this->layout = 'blank';

            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                if (Yii::$app->user->can('login-admin')){
                    return $this->goBack();
                }else{
                    Yii::$app->user->logout();
                }

            }

            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}

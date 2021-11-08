<?php

namespace frontend\controllers;

use yii\web\Controller;


/**
 * Site controller
 */
class LeilaoController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function actionIndex()
    {
        return $this->render('index');
    }
}


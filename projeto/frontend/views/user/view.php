<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1 align="center"> Utilizador: <?= Html::encode($model->username) ?></h1>

    <?php

    if (Yii::$app->getUser()->id != $model->id){
        $this->render('error', [
            'model' => $model,
        ]);
    }

    ?>

    <p align="center">
        <?= Html::a('Alterar campos', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        if (Yii::$app->user->can('delete-profile')){ ?>
            <?=
            Html::a('Apagar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
         ?>

    </p>

    <style>
        input, label {
            display:block;
            width: 100%;
        }
    </style>



    <div style="float:left; margin-right:20px;">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['readonly'=>!$model->isNewRecord,'maxlength' => true]) ?>

        <?= $form->field($model, 'password_hash')->passwordInput(['readonly'=>!$model->isNewRecord,'maxlength' => true])->label('Password') ?>

        <?= $form->field($model, 'email')->textInput(['size'=>'100%','readonly'=>!$model->isNewRecord,'maxlength' => true]) ?>

        <?php ActiveForm::end(); ?>


    </div>



</div>

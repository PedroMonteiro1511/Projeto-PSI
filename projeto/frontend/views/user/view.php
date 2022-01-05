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


    <style>
        input, label {
            display:block;
            width: 100%;
        }
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
    </style>

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4><?= $model->username ?></h4>
                                </div>
                            </div>
                            <hr class="my-4">
                            <?php
                            if (Yii::$app->user->can('admin')){
                                echo '<h4>Classe: Admin</h4>';
                            }elseif (Yii::$app->user->can('gestor')){
                                echo '<h4>Classe: Gestor</h4>';
                            } elseif (Yii::$app->user->isGuest){
                                echo '<h4>Classe: Utilizador</h4>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="row mb-3"

                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'username')->textInput(['readonly'=>!$model->isNewRecord,'maxlength' => true]) ?>

                            <?= $form->field($model, 'password_hash')->passwordInput(['readonly'=>!$model->isNewRecord,'maxlength' => true])->label('Password') ?>

                            <?= $form->field($model, 'email')->textInput(['size'=>'100%','readonly'=>!$model->isNewRecord,'maxlength' => true]) ?>

                            <?php ActiveForm::end(); ?>



                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <?= Html::a('Alterar campos', ['update', 'id' => $model->id], ['class' => 'btn btn-primary px-4']) ?>
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

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1 align="center"> Utilizador: <?= Html::encode($model->username) ?></h1>

    <p align="center">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        if (Yii::$app->user->can('delete-profile')){ ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id], [
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

        <label for="id">ID:</label>
        <input maxlength="true" id="id" type="text" readonly="true" value="<?= $model->id ?>">
        <br>
        <label for="username">Username:</label>
        <input id="username" type="text" readonly="true" value="<?= $model->username ?>">
        <br>
        <label for="password">Password:</label>
        <input id="password" type="text" readonly="true" value="<?= $model->password_hash ?>">
        <br>
        <label for="email">Email:</label>
        <input id="email" type="text" readonly="true" value="<?= $model->email ?>">


    </div>



</div>

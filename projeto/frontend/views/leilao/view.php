<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Leilao */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leilaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="leilao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php

        if (Yii::$app->getUser()->id == $model->idUser){   // Somente o autor do anuncio pode alterar/ apagar o anuncio.
            ?>
            <?=        // If true
            Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
            ?>
            <?php


        }

        if (!Yii::$app->user->isGuest && Yii::$app->getUser()->id != $model->idUser ){ ?>
        <?=    Html::a('Oferta', ['oferta/create', 'id' => $model->id, 'iduser' => Yii::$app->user->getId()], ['class' => 'btn btn-primary']); ?>
        <?php
        }  // FIM DO IF
        ?>
    </p>

    <?php
    if (Yii::$app->getUser()->id == $model->idUser){
        ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idUser',
            'titulo',
            'descricao:ntext',
            'datalimite',
            'precobase',
            'aprovado',
        ],
    ]) ?>
    <?php
    } else {

    ?>
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'descricao:ntext',
            'datalimite',
            'precobase',
        ],
    ]) ?>

    <?php
    }
    ?>




</div>

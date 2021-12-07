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

        $userid = Yii::$app->getUser()->id;

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


        }  // FIM DO IF
        ?>
    </p>

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




</div>

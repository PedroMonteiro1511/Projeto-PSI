<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OfertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\Leilao */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Leilaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="leilao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (!Yii::$app->user->isGuest && Yii::$app->getUser()->id != $model->idUser && $data1<$data2){?>
        <?=Html::a('Oferta', ['oferta/create', 'id' => $model->id, 'iduser' => Yii::$app->user->getId()], ['class' => 'btn btn-primary']); ?>
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




    <?php

    $data1 = gmdate('Y-m-d h:i:s \G\M\T');
    $data2 = $model->datalimite;

    if (Yii::$app->getUser()->id == $model->idUser){   // Inicio do IF
    ?>
        <h1>Ofertas ao seu leilão</h1>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
                'columns' => [
                    [
                    'attribute' => 'Data da oferta',
                    'value' => 'dataoferta',
                    ],
                [
                    'attribute' => 'Montante Oferecido',
                    'value' => 'montante',
                ],
                    [
                            'header' => 'Contactar Participante',
                            'content' =>  function($model){
                                return Html::a('📞 Contactar', ['user/details','id' => $model->iduser], ['class' => 'btn btn-primary']);
                            }
                    ],
            ],

        ]); ?>

        <?php
    }
    // Fim do IF
    ?>


</div>

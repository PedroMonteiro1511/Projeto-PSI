<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
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

        $data1 = gmdate('Y-m-d h:i:s \G\M\T');
        $data2 = $model->datalimite;

        if (Yii::$app->getUser()->id == $model->idUser && $data1>$data2){   // Somente o autor do anuncio pode alterar/ apagar o anuncio.
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

        if (!Yii::$app->user->isGuest && Yii::$app->getUser()->id != $model->idUser && $data1<$data2){ ?>
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


    <style>
        span.separator {
            border-top: 1px solid #333;
            width: 100%;
            height: 1px;
            display: block;
        }

        hr{
            border: 1px solid grey;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid grey;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: lightgrey;
        }
    </style>
    <table>
        <tr>
            <th>Data Oferta</th>
            <th>Montante</th>
            <th>Participante</th>
        </tr>

    <?php foreach ($ofertas as $oferta): ?>



        <?php

        if ($oferta->idleilao == $model->id ){



            ?>

            <tr>
                <td> <?= $oferta->dataoferta ?> </td>
                <td> <?= $oferta->montante ?> </td>
                <td> <?= Html::a('Contactar participante', ['user/details', 'id' => $oferta->iduser], ['class' => 'btn btn-primary'])?></td>
            </tr>

            <?php
        }

        ?>

    <?php endforeach; ?>

        </table>


</div>

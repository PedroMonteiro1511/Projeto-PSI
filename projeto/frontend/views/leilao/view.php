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

    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
    </style>

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
?>

    </p>

    <?php
    if (Yii::$app->getUser()->id == $model->idUser){
        ?>

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><?= $model->titulo ?></h3>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6">
                            <div class="white-box text-center"><img src="<?= $model->imagem ?>" class="img-responsive"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <h4 class="box-title mt-5"><?= $model->titulo ?></h4>
                            <p><?= $model->descricao ?></p>
                            <h2 class="mt-5">
                               Preço Base: <?= $model->precobase ?> €<small class="text-success"></small>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <?php } else {

    ?>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><?= $model->titulo ?></h3>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6">
                            <div class="white-box text-center"><img src="https://via.placeholder.com/430x600/00CED1/000000" class="img-responsive"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <h4 class="box-title mt-5"><?= $model->titulo ?></h4>
                            <p><?= $model->descricao ?></p>
                            <h2 class="mt-5">
                               Preço base: <?= $model->precobase ?> €<small class="text-success"></small>
                            </h2>
                            <?php
                            if (!Yii::$app->user->isGuest && Yii::$app->getUser()->id != $model->idUser && $data1<$data2){ ?>
                            <?=    Html::a('Oferta', ['oferta/create', 'id' => $model->id, 'iduser' => Yii::$app->user->getId()], ['class' => 'btn btn-primary']); ?>
                            <?php
                            }  // FIM DO IF
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

    <?php
    if ($model->idUser == Yii::$app->getUser()->id){


echo '
    <table>
        <tr>
            <th>Data Oferta</th>
            <th>Montante</th>
            <th>Participante</th>
        </tr>';
 ?>
    <?php foreach ($ofertas as $oferta): ?>



        <?php

        if ($oferta->idleilao == $model->id ){



            ?>
            <tr>
                <td> <?= $oferta->dataoferta ?> </td>
                <td> <?= $oferta->montante ?> € </td>
                <td> <?= Html::a('Contactar participante', ['user/details', 'id' => $oferta->iduser], ['class' => 'btn btn-primary'])?></td>
            </tr>

            <?php
        }

        ?>

    <?php endforeach; ?>

    <?php
    }
    ?>
        </table>


</div>

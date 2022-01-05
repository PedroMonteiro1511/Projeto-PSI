<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Venda */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="venda-view">

    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
    </style>

    <h1><?= Html::encode($this->title); ?></h1>
    <p>
        <?php

        $userid = Yii::$app->getUser()->id;

        if (Yii::$app->getUser()->id == $model->idUser){   // Somente o autor do anuncio pode alterar/ apagar o anuncio.
            ?>
        <?=        // If true
            Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            ?>

            <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
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
                            <?= $model->preco ?>  €<small class="text-success"></small>
                        </h2>

                        <?= Html::a('📞 Contactar o Vendedor', ['user/details', 'id' => $model->idUser], ['class' => 'btn btn-primary']); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'descricao:ntext',
            'preco',
        ],
    ]) ?>

    <?= Html::a('⭐ Adicionar aos Favoritos', ['favoritos', 'id' => $model->id], ['class' => 'btn btn-primary']); ?>
    <?= Html::a('📞 Contactar o Vendedor', ['user/details', 'id' => $model->idUser], ['class' => 'btn btn-primary']); ?>

</div>

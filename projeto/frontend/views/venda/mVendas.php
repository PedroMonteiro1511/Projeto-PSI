<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LeilaoSearch */
/* @var $dataProviderVenda yii\data\ActiveDataProvider */

$this->title = 'Minhas Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>


<p>
    <?= Html::a('Adicionar um leilão', ['create'], ['class' => 'btn btn-success']) ?>

    <?= Html::a('Adicionar uma Venda', ['vendas'], ['class' => 'btn btn-success']) ?>
</p>


<h1 align="center">Minhas Vendas</h1>


<?= GridView::widget([
    'dataProvider' => $dataProviderVenda,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'titulo',
        'descricao:ntext',
        'preco',
        //'aprovado',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>


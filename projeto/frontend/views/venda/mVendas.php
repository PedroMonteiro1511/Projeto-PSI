<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Venda */
/* @var $searchModel common\models\VendaSearch */
/* @var $dataProviderVenda yii\data\ActiveDataProvider */

$this->title = 'Minhas Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>


<p>
    <?= Html::a('Adicionar uma Venda', ['create'], ['class' => 'btn btn-success']) ?>
</p>


<h1 align="center">Minhas Vendas</h1>


<?= GridView::widget([
    'dataProvider' => $dataProviderVenda,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'titulo',
        'descricao:ntext',
        'preco',
        [
                'label' =>'Imagem',
                 'attribute' =>'imagem',
                 'format' => 'html',
                 'value' => function($model){
                    return yii\bootstrap\Html::img($model->imagem,['width' => '150']);

                 }
        ],

        //'aprovado',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>


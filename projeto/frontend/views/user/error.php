<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Error';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-index">

    <h1>Erro, acção nao autorizada</h1>


    <?php echo "O utilizador ". Yii::$app->getUser()->id . " não está autorizado a editar/apagar esta página" ?>

    <br>

    <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-primary']); ?>



</div>


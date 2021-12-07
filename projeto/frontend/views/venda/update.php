<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Venda */

$this->title = 'Update Venda: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="venda-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php

    if ( Yii::$app->getUser()->id != $model->idUser){ ?>
    <?=
        $this->render('error', [
             'model' => $model,
        ]);

        ?>


    <?php
    }
    else { ?>
     <?=   $this->render('_form', [
            'model' => $model,
        ]) ?>

    <?php
    }
    ?>





</div>

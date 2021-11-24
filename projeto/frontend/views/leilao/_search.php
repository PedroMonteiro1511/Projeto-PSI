<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LeilaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leilao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'titulo',[
            'template'=>"<label> Pesquise pelo Titulo </label>\n{input}\n{hint}\n{error}"
    ]) ?>

    <?php // echo $form->field($model, 'precobase') ?>

    <?php // echo $form->field($model, 'aprovado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-outline-secondary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Venda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Titulo')])->label('Titulo') ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6, 'placeholder' => Yii::t('app', 'Descrição')])->label('Descrição') ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true])->label('Preço') ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Criar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

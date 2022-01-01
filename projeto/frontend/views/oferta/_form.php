<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Oferta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oferta-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'montante')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

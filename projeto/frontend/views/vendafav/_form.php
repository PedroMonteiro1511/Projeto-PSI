<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vendafav */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendafav-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iduser')->textInput() ?>

    <?= $form->field($model, 'idvenda')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

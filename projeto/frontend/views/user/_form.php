<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="user-form">



<?php $form = ActiveForm::begin(); ?>

<div class="container rounded bg-white mt-5 mb-5" align="center">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://bootdey.com/img/Content/avatar/avatar6.png"><span class="font-weight-bold"><?= $model->username ?></span><span class="text-black-50"><?= $model->email ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?></div>
                    <div class="col-md-6"><?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label('Password') ?></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>
                </div>

                <div class="mt-5 text-center"><?= Html::submitButton('Save', ['class' => 'btn btn-primary profile-button']) ?></div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

</div>
</div>
</div>

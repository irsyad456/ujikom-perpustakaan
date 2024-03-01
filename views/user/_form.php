<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="x_panel">
    <?php $form = ActiveForm::begin(); ?>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">
            Name
        </label>
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label(false) ?>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">
            Email
        </label>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false) ?>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">
            Username
        </label>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(false) ?>
    </div>

    <?php if ($model->isNewRecord) : ?>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">
                Password
            </label>
            <?= $form->field($model, 'password_hash')->textInput()->label(false) ?>
        </div>

    <?php endif ?>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">
            Alamat
        </label>
        <?= $form->field($model, 'alamat')->textarea(['rows' => 6])->label(false) ?>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">
            Role
        </label>
        <?php if ($model->isNewRecord) {
            echo Html::dropDownList('role', null, [
                'Administrator' => 'Administrator',
                'Peminjam' => 'Peminjam',
                'Petugas' => 'Petugas'
            ], [
                'prompt' => ''
            ]);
        } else echo Html::dropDownList('role', $role[0]['item_name'], [
            'Administrator' => 'Administrator',
            'Peminjam' => 'Peminjam',
            'Petugas' => 'Petugas'
        ], [
            'prompt' => ''
        ]) ?>
    </div>

    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <button class="btn btn-warning" type="reset">Reset</button>
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
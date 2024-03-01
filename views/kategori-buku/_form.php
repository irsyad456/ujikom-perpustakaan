<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\KategoriBuku $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'namaKategori')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
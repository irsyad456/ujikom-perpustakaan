<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<h1>Login Form</h1>

<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<div>
    <?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => 'Username', 'required' => true])->label(false) ?>
</div>

<div>
    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password', 'required' => true])->label(false) ?>
</div>

<?= $form->field($model, 'rememberMe')->checkbox([
    'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
]) ?>

<div>
    <?= Html::submitButton('Login', ['class' => 'btn btn-default submit']) ?>
</div>

<?php ActiveForm::end(); ?>

<div class="clearfix"></div>
<div class="separator">
    <p class="change_link">Don't Have Account ?
        <?= Html::a('Create Account', ['site/register'], ['class' => 'to_register']) ?>
    </p>
    <div class="clearfix"></div>
    <br />
    <div>
        <p><strong>Per</strong>tal @2024 All Rights Reserved.</p>
    </div>
</div>
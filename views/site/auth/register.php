<!-- <h1>Create Account</h1>
<div>
    <input type="text" class="form-control" placeholder="Username" required="" />
</div>
<div>
    <input type="email" class="form-control" placeholder="Email" required="" />
</div>
<div>
    <input type="password" class="form-control" placeholder="Password" required="" />
</div>
<div>
    <a class="btn btn-default submit" href="index.html">Submit</a>
</div> -->
<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
<h1>Register Form</h1>

<div>
    <?= $form->field($model, 'nama')->textInput(['class' => 'form-control', 'placeholder' => 'Nama', 'required' => true])->label(false) ?>
</div>

<div>
    <?= $form->field($model, 'alamat')->textarea(['class' => 'form-control', 'placeholder' => 'Alamat', 'required' => true])->label(false) ?>
</div>

<div>
    <?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => 'Username', 'required' => true])->label(false) ?>
</div>

<div>
    <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'Email', 'required' => true])->label(false) ?>
</div>

<div>
    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password', 'required' => true])->label(false) ?>
</div>

<div>
    <?= Html::submitButton('Register', ['class' => 'btn btn-default submit']) ?>
</div>

<?php ActiveForm::end(); ?>

<div class="clearfix"></div>
<div class="separator">
    <p class="change_link">Already Have Account ?
        <?= Html::a('Login', ['site/login'], ['class' => 'to_register']) ?>
    </p>
    <div class="clearfix"></div>
    <br />
    <div>
        <p><strong>Per</strong>tal @2024 All Rights Reserved.</p>
    </div>
</div>
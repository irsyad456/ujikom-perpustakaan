<?php

use app\models\KategoriBuku;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Buku $model */
/** @var yii\widgets\ActiveForm $form */
?>
<?php $form = ActiveForm::begin(); ?>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">
        Judul
    </label>
    <div class="col-md-4 col-sm-4">
        <?= $form->field($model, 'judul')->textInput(['maxlength' => true])->label(false) ?>
    </div>
</div>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">
        Kategori Buku
    </label>
    <div class="col-md-4 col-sm-4">
        <?= $form->field($relasi, 'kategoribuku_id')->dropDownList(
            ArrayHelper::map(KategoriBuku::find()->all(), 'id', 'namaKategori'),
            [
                'prompt' => '',
                'class' => 'select2_single form-control',
                'tabindex' => '-1'
            ]
        )->label(false) ?>
    </div>
</div>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">
        Penulis
    </label>
    <div class="col-md-4 col-sm-4">
        <?= $form->field($model, 'penulis')->textInput(['maxlength' => true])->label(false) ?>
    </div>
</div>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">
        Penerbit
    </label>
    <div class="col-md-4 col-sm-4">
        <?= $form->field($model, 'penerbit')->textInput(['maxlength' => true])->label(false) ?>
    </div>
</div>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="">
        Tahun Terbit
    </label>
    <div class="col-md-4 col-sm-4">
        <?= $form->field($model, 'tahunTerbit')->widget(
            DatePicker::class,
            [
                'layout' => '{picker}{input}',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd'
                ]
            ]
        )->label(false) ?>
    </div>
</div>

<div class="ln_solid"></div>
<div class="item form-group">
    <div class="col-md-6 col-sm-6 offset-md-3">
        <button class="btn btn-warning" type="reset">Reset</button>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
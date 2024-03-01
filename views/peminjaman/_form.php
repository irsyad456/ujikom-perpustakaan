<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Peminjaman $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php $form = ActiveForm::begin(['class' => 'form-horizontal form-label-left']); ?>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="peminjaman-tanggal_peminjaman">
        Tanggal Peminjaman
    </label>
    <?php if ($model->isNewRecord) : ?>
        <?= $form->field(
            $model,
            'tanggal_peminjaman'
        )->widget(
            DatePicker::class,
            [
                'layout' => '{picker}{input}',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]
        )->label(false) ?>
    <?php else : ?>
        <?= $form->field(
            $model,
            'tanggal_peminjaman'
        )->widget(
            DatePicker::class,
            [
                'layout' => '{picker}{input}',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                ],
                'options' => ['disabled' => true]
            ]
        )->label(false) ?>
    <?php endif ?>
</div>



<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="peminjaman-tanggal_pengembalian">
        Tanggal Pengembalian
    </label>
    <?= $form->field(
        $model,
        'tanggal_pengembalian'
    )->widget(
        DatePicker::class,
        [
            'layout' => '{picker}{input}',
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd'
            ]
        ]
    )->label(false) ?>
</div>

<?php if (!$model->isNewRecord) : ?>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="peminjaman-status_peminjaman">
            Status Peminjaman
        </label>
        <div class="col-md-3 col-sm-3">
            <?= $form->field($model, 'status_peminjaman')->dropDownList(
                [
                    'Dipinjam' => 'Dipinjam',
                    'Dikembalikan' => 'Dikembalikan',
                    'Hilang' => 'Hilang',
                    'Rusak' => 'Rusak',
                ],
                ['class' => 'form-control']
            )->label(false) ?>
        </div>
    </div>
<?php endif ?>

<div class="ln_solid"></div>
<div class="item form-group">
    <div class="col-md-6 col-sm-6 offset-md-3">
        <button class="btn btn-warning" type="reset">Reset</button>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
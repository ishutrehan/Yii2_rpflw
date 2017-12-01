<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */
/* @var $form yii\widgets\ActiveForm */
?>
 <div class="login_area">
<div class="sales-form">

    <?php $form = ActiveForm::begin(['method' => 'post']); ?>

    <?= $form->field($model, 'order_date')->textInput(['maxlength' => true, 'class' => 'form-control js-datepicker', 'placeholder' => "yyyy-mm-dd" ]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true])->label('First Name') ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true])->label('Last Name') ?>

    <?= $form->field($model, 'jobnumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'products_sold')->textInput(['maxlength' => true])->label('Products Sold') ?>

    <?= $form->field($model, 'commission_amt')->textInput(['maxlength' => true])->label('Commission Amount') ?>

    <?= $form->field($model, 'status')
        ->dropDownList(   
        ['pending'=>'Pending','completed'=>'Completed','cancelled'=>'Cancelled']    // options
        ) ?>

     <?= $form->field($model, 'finalize_date')->textInput(['maxlength' => true,'class' => 'form-control js-datepicker','placeholder' => "yyyy-mm-dd"]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6])->label('Notes') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
<?php

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Update Sale';
?>
<div class="site-index">


    <div class="body-content">
        <div class="row">

        	    <?php $form = ActiveForm::begin(['method' => 'post']); ?>

			    <?= $form->field($model, 'payment_status')
			        ->dropDownList(['Paid'=>'Paid','Unpaid'=>'Unpaid']) ?>

			    <?= $form->field($model, 'status')
			        ->dropDownList(['pending'=>'Pending','completed'=>'Completed','cancelled'=>'Cancelled']) ?>


			    <?= $form->field($model, 'revenue')->textInput(['maxlength' => true])->label('Revenue') ?>

			    <?= $form->field($model, 'finalize_date')->textInput(['maxlength' => true,'class' => 'form-control js-datepicker','placeholder' => "mm/dd/yyyy"]) ?>

			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' , "name"=> "update", "value" => 'update']) ?>
			    </div>

			    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

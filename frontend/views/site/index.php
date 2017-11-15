<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'RepFlow';
?>
<div class="site-index">
    <div class="middl_cntr">
        <div class="container">
                  <div class="login_area">
                    <?php if (Yii::$app->session->hasFlash('error')): ?>
                      <div class="alert alert-warning alert-dismissable">
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>            
                      <?= Yii::$app->session->getFlash('error'); ?>
                      </div>
                    <?php endif; ?>
                   
                    <div class="innr_log">   
                      <h3> Sign is as:</h3>
                         <ul>
                              <li><a href="#salesModal" data-toggle="modal" class="btn btn-md btn-block btn-success">Sales Rep</a></li>
                              <li><a href="#adminModal" data-toggle="modal" class="btn btn-block btn-info">Admin</a></li>
                         </ul>
                    </div>
                </div>
        </div>
    </div>
  </div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="salesModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Sales Rep Login</h4>
            </div>
            <div class="modal-body">

                <?php $form = ActiveForm::begin(['id' => 'login-form','method' => 'post','action' =>Url::to(['site/login'])]); ?>
                    <input type="hidden" name="role" value="2">

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'type' => 'email']) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>


                    <div style="color:#999;margin:1em 0">
                        <?= Html::a('forgot password', ['site/request-password-reset']) ?>.
                    </div>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="adminModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Admin Login</h4>
            </div>
            <div class="modal-body">

               <?php $form = ActiveForm::begin(['id' => 'login-form','method' => 'post','action' =>Url::to(['site/login'])]); ?>
                    <input type="hidden" name="role" value="1">
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'type' => 'email']) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>


                    <div style="color:#999;margin:1em 0">
                        <?= Html::a('forgot password', ['site/request-password-reset']) ?>.
                    </div>
                    
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
    </div>
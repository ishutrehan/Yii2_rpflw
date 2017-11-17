<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\RepForm */

$this->title = 'Settings';
?>
<div class="panel-body">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <?php if (Yii::$app->session->hasFlash('error')): ?>
                      <div class="alert alert-warning alert-dismissable">
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>            
                      <?= Yii::$app->session->getFlash('error'); ?>
                      </div>
                    <?php endif; ?>
                     <?php if (Yii::$app->session->hasFlash('Success')): ?>
                      <div class="alert alert-warning alert-dismissable">
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>            
                      <?= Yii::$app->session->getFlash('Success'); ?>
                      </div>
                    <?php endif; ?>
            <?php $form = ActiveForm::begin(['method' => 'post', 
                'options' => [
                    'class' => 'form-horizontal','enctype' => 'multipart/form-data'
                ],'action' => Url::to(['rep/updateuser'])]); ?>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">First Name</label>
                    <div class="col-lg-9">
                        <input class="form-control" value="<?= $user->first_name; ?>" id="fname" placeholder="First Name" name="first_name" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Last Name</label>
                    <div class="col-lg-9">
                        <input class="form-control" value="<?= $user->last_name; ?>" id="lname" placeholder="Last Name" name="last_name" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Address</label>
                    <div class="col-lg-9">
                        <input class="form-control" value="<?= $user->address; ?>" id="address" placeholder="Address" name="address" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">City</label>
                    <div class="col-lg-9"> 
                        <input class="form-control" value="<?= $user->city; ?>" id="city" placeholder="City" name="city" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Password</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="inputPassword1" placeholder="Password" name="password" type="password">
                        <span class="notdv">Note: If you do not enter password and new password then your other information will be update or you enter your current password and new password then your password will be update.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">New Password</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="inputPassword1" placeholder="New Password" name="newpassword" type="password">
                    </div>
                </div>
                <div class="form-group">
                   <div class="col-lg-3 col-sm-3 control-label"></div>
                    <div class="col-lg-9 fileimg">
                        <label for="image"><span>Upload file</span> Upload file</label>
                        <input class="form-control" id="image" name="file" type="file">
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked name="check" value="yes"> Recieve Email Notifications
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <button type="submit" class="btn btn-info" name="save">Save</button>
                    </div>

                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
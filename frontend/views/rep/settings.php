


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\RepForm */
$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">
  <div class="row">
        <div class="col-md-12"><h1><?= Html::encode($this->title) ?></h1>
            <div class="right_breadcrum"><?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
        </div>
    </div>
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
                    <label for="inputstate" class="col-lg-3 col-sm-3 control-label">State</label>
                    <div class="col-lg-9"> 
                       <select class="form-control" name="state" value="<?= $user->state; ?>">
                       <option value="<?= $user->state;?>"><?= $user->state; ?></option>
                       
                         <?php
                       $arr = ['Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming','District of Columbia','Puerto Rico','Guam','American Samoa','U.S. Virgin Islands','Northern Mariana Islands'];
                    
                        $length = count($arr);
                        for($i=0;$i<$length;$i++){
                        echo "<option value=".$arr[$i].">".$arr[$i]."</option>";  
                        }
                     ?>
                    </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="inputZipCode" class="col-lg-3 col-sm-3 control-label">Zip Code</label>
                    <div class="col-lg-9"> 
                        <input class="form-control" value="<?= $user->zip_code; ?>" id="ZipCode" placeholder="Zip Code" name="zip" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Password</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="inputPassword1" placeholder="Password" name="password" type="password">
                        <span class="notdv">Note: To set a new password, please type your existing password.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">New Password</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="inputPassword1" placeholder="New Password" name="newpassword" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCPassword1" class="col-lg-3 col-sm-3 control-label">Confirm Password</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="inputCPassword1" placeholder="Confirm Password" name="confirmpassword" type="password">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label">Email</label>
                    <div class="col-lg-9">
                        <input class="form-control" value="<?= $user->email; ?>" id="inputEmail1" placeholder="Email" name="email" type="email">
                    </div>
                </div>    -->
                 <div class="form-group">
                  <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Profile Image</label>

                    <div class="col-lg-9 fileimg">
                        <label for="image"><span>Upload file</span></label>
                        <input class="form-control" id="image" name="file" type="file">
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="check" value="yes" checked> Recieve Email Notifications
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
</div>

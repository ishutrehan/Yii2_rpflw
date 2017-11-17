<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\ActiveForm;

$this->title = 'Team';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
	<h3><?= Html::encode($this->title) ?></h3>
	<div class="right_breadcrum"><?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    </div>
	<div class="body-content">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<a href="#salesModal" data-toggle="modal" class="btn btn-md btn-block btn-success mbot-20">Add New Sales Rep</a>
				</div>
			</div>
			<?php if (Yii::$app->session->hasFlash('Success')): ?>
              <div class="alert alert-warning alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>            
              <?= Yii::$app->session->getFlash('Success'); ?>
              </div>
            <?php endif; ?>
			<div class="ourteam_section">
				<div class="row">
					<?php  foreach ($model as $key => $value) { ?>
						<div class="col-md-6">
							<div class="margrita_bx">
								<h3><?=$value->first_name ?> <?=$value->last_name ?></h3>
								<div class="dv_rw">
									<div class="img_team"><img src="team-img.jpg"></div>
									<div class="cont_team">
										<h4><?=$value->address ?></h4>
										<p><?=$value->city ?><br>
											<a href=""><?=$value->email ?></a><br>
										p:(123) 456-7890</p>
									</div>
								</div>
								<a href="<?= Url::to(['rep/delete', 'id' => $value->id]); ?>" onclick="return confirm('Are you sure you want to delete this User?');" class="btn btn-md btn-block btn-danger">Delete</a>
							</div>
						</div>

					<?php } ?>
					
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
                <h4 class="modal-title">Add New Sales Rep</h4>
            </div>
            <div class="modal-body">
				<p id="error" style="color: red;"></p>
				<h3 class="success" style="display: none;text-align: center;">Invite Sent Successfully!</h3>
                <?php $form = ActiveForm::begin([
                	'id' => 'login-form',
                	'method' => 'post',
                	'action' => Url::to(['rep/signup']),
                ]); ?>
                <?= $form->field($user, 'email')->textInput(['autofocus' => true, 'type' => 'email', 'required'=>true])->label("Email Address") ?>
                <?= $form->field($user, 'first_name')->textInput(['maxlength' => true , 'required'=>true])->label('First Name') ?>
				<?= $form->field($user, 'last_name')->textInput(['maxlength' => true])->label('Last Name') ?>
                <div class="form-group">
                    <?= Html::submitButton('ADD', ['class' => 'btn btn-primary log-btn', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

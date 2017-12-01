<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\RepForm */
$this->title = 'Team';
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
<div class="monthly_section">
    <div class="col-md-6">
        <div class="panel">
            <header class="panel-heading">
                Monthly Leaderboard
                <span class="tools pull-right">
                    <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                    <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                    <a class="close-box fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">
                <div id="graph-donut"><svg height="342" version="1.1" width="489" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#62549a" d="M244.5,283.3333333333333A109.33333333333333,109.33333333333333,0,1,0,143.65721935189538,131.75652276462046" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#62549a" stroke="#ffffff" d="M244.5,286.3333333333333A112.33333333333333,112.33333333333333,0,1,0,140.890191834112,130.59740296243018L97.84754155748197,112.56665048391451A159,159,0,1,1,244.5,333Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#4aa9e9" d="M143.65721935189538,131.75652276462046A109.33333333333333,109.33333333333333,0,0,0,152.10140463513977,232.44892943740382" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#4aa9e9" stroke="#ffffff" d="M140.890191834112,130.59740296243018A112.33333333333333,112.33333333333333,0,0,0,149.5660773232991,234.0527110378204L105.90210695270969,261.6733941561057A164,164,0,0,1,93.23582902784304,110.63478414693068Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#23b9a9" d="M152.10140463513977,232.44892943740382A109.33333333333333,109.33333333333333,0,0,0,206.90273060383214,276.6655887419429" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#23b9a9" stroke="#ffffff" d="M149.5660773232991,234.0527110378204A112.33333333333333,112.33333333333333,0,0,0,205.8710982118641,279.48263233547186L189.8234832256949,323.3033104570328A159,159,0,0,1,110.12765247244414,259.0004248220781Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#eac459" d="M206.90273060383214,276.6655887419429A109.33333333333333,109.33333333333333,0,0,0,244.46565192088588,283.33332793794966" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#eac459" stroke="#ffffff" d="M205.8710982118641,279.48263233547186A112.33333333333333,112.33333333333333,0,0,0,244.4647094431053,286.3333277899056L244.45004867762975,332.9999921536646A159,159,0,0,1,189.8234832256949,323.3033104570328Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="244.5" y="164" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#626262" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(3.2157,0,0,3.2157,-541.9084,-382.2059)" stroke-width="0.3109756097560976"><tspan dy="5.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">John</tspan></text><text x="244.5" y="184" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#626262" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(2.2778,0,0,2.2778,-312.1172,-224.8889)" stroke-width="0.43902439024390244"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Atleast <?php echo $sales ?></tspan></text></svg></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page-title"> Your Income
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="panel short-states">
                    <div class="panel-title">
                        <h4> <span class="label label-danger pull-right">Daily Income</span></h4>
                    </div>
                    <div class="panel-body">
                        <h1><?php echo $daily ?></h1>
                        <!-- <div class="text-danger pull-right">53% <i class="fa fa-bolt"></i></div> -->
                        <small>Daily income</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="panel short-states">
                    <div class="panel-title">
                        <h4> <span class="label label-info pull-right">Weekly Income</span></h4>
                    </div>
                    <div class="panel-body">
                        <h1><?php echo $week ?></h1>
                        <!-- <div class="text-info pull-right">65% <i class="fa fa-level-up"></i></div> -->
                        <small>Weekly Income</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="panel short-states">
                    <div class="panel-title">
                        <h4> <span class="label label-warning pull-right">Monthly Income</span></h4>
                    </div>
                    <div class="panel-body">
                        <h1><?php echo $month ?></h1>
                        <!-- <div class="text-warning pull-right">77% <i class="fa fa-level-down"></i></div> -->
                        <small>Monthly Income</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="panel short-states">
                    <div class="panel-title">
                        <h4> <span class="label label-success pull-right">Annual Income</span></h4>
                    </div>
                    <div class="panel-body">
                        <h1><?php echo $year ?></h1>
                        <!--  <div class="text-success pull-right">88% <i class="fa fa-level-up"></i></div> -->
                        <small>Annual Income</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
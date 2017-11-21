<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">


    <div class="body-content">
    
        <div class="row">
                            <div class="col-md-8">
                                <h1 class="page-title"> Admin Dashboard
                                    <small>data, statistics, charts, recent reports and many more</small>
                                </h1>
                            </div>
						 <div class="right_breadcrum"><?= Breadcrumbs::widget([
					        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					    ]) ?>
					    </div>
                        </div>

        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="panel short-states">
                                    <div class="panel-title">
                                        <h4> <span class="label label-danger pull-right">Daily Income</span></h4>
                                    </div>
                                    <div class="panel-body">
                                        <h1>$<?php echo $daily;?></h1>
                                        <div class="text-danger pull-right"><!-- 53% <i class="fa fa-bolt"></i> --></div>
                                        <small>Daily income</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="panel short-states">
                                    <div class="panel-title">
                                        <h4> <span class="label label-info pull-right">Weekly Income</span></h4>
                                    </div>
                                    <div class="panel-body">
                                        <h1>$<?php echo $week;?></h1>
                                        <div class="text-info pull-right"><!-- 65% <i class="fa fa-level-up"></i> --></div>
                                        <small>Weekly Income</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="panel short-states">
                                    <div class="panel-title">
                                        <h4> <span class="label label-warning pull-right">Monthly Income</span></h4>
                                    </div>
                                    <div class="panel-body">
                                        <h1>$<?php echo $month;?></h1>
                                        <div class="text-warning pull-right"><!-- 77% <i class="fa fa-level-down"></i> --></div>
                                        <small>Monthly Income</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="panel short-states">
                                    <div class="panel-title">
                                        <h4> <span class="label label-success pull-right">Annual Income</span></h4>
                                    </div>
                                    <div class="panel-body">
                                        <h1>$<?php echo $year;?></h1>
                                        <div class="text-success pull-right"><!-- 88% <i class="fa fa-level-up"></i> --></div>
                                        <small>Annual Income</small>
                                    </div>
                                </div>
                            </div>
        </div>
        <div class="row">
     		<div class="col-md-6">
                                <div class="panel">
                                    <header class="panel-heading">
                                       Team
                                        <span class="tools pull-right">
                                            <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                                            <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="close-box fa fa-times" href="javascript:;"></a>
                                        </span>
                                    </header>
                                    <div class="panel-body">
                                        <div id="graph-donut"><svg height="342" version="1.1" width="489" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#62549a" d="M244.5,283.3333333333333A109.33333333333333,109.33333333333333,0,1,0,143.65721935189538,131.75652276462046" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#62549a" stroke="#ffffff" d="M244.5,286.3333333333333A112.33333333333333,112.33333333333333,0,1,0,140.890191834112,130.59740296243018L97.84754155748197,112.56665048391451A159,159,0,1,1,244.5,333Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#4aa9e9" d="M143.65721935189538,131.75652276462046A109.33333333333333,109.33333333333333,0,0,0,152.10140463513977,232.44892943740382" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#4aa9e9" stroke="#ffffff" d="M140.890191834112,130.59740296243018A112.33333333333333,112.33333333333333,0,0,0,149.5660773232991,234.0527110378204L110.12765247244414,259.0004248220781A159,159,0,0,1,97.84754155748197,112.56665048391451Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#23b9a9" d="M152.10140463513977,232.44892943740382A109.33333333333333,109.33333333333333,0,0,0,206.90273060383214,276.6655887419429" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#23b9a9" stroke="#ffffff" d="M149.5660773232991,234.0527110378204A112.33333333333333,112.33333333333333,0,0,0,205.8710982118641,279.48263233547186L188.10409590574818,327.9983831129144A164,164,0,0,1,105.90210695270969,261.6733941561057Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#eac459" d="M206.90273060383214,276.6655887419429A109.33333333333333,109.33333333333333,0,0,0,244.46565192088588,283.33332793794966" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#eac459" stroke="#ffffff" d="M205.8710982118641,279.48263233547186A112.33333333333333,112.33333333333333,0,0,0,244.4647094431053,286.3333277899056L244.45004867762975,332.9999921536646A159,159,0,0,1,189.8234832256949,323.3033104570328Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="244.5" y="164" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#626262" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(3.2157,0,0,3.2157,-542.2546,-382.2059)" stroke-width="0.3109756097560976"><tspan dy="5.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">John</tspan></text><text x="244.5" y="184" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#626262" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(2.2778,0,0,2.2778,-312.1172,-224.8889)" stroke-width="0.43902439024390244"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">approx. <?php echo $sales?>%</tspan></text></svg></div>
                                    </div>
                                </div>
        	</div>
        	<div class="col-md-6">
                                <div class="panel">
                                    <header class="panel-heading">
                                       Product sales
                                        <span class="tools pull-right">
                                            <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                                            <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="close-box fa fa-times" href="javascript:;"></a>
                                        </span>
                                    </header>
                                    <div class="panel-body">
                                        <div id="graph-area-line" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="342" version="1.1" width="489" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="21.5" y="309" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M34,309H464" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="21.5" y="238" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2</tspan></text><path fill="none" stroke="#aaaaaa" d="M34,238H464" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="21.5" y="167" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">4</tspan></text><path fill="none" stroke="#aaaaaa" d="M34,167H464" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="21.5" y="96" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">6</tspan></text><path fill="none" stroke="#aaaaaa" d="M34,96H464" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="21.5" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">8</tspan></text><path fill="none" stroke="#aaaaaa" d="M34,25H464" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="464" y="321.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012-03</tspan></text><text x="393.5081967213115" y="321.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012-01</tspan></text><text x="321.8415300546448" y="321.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-11</tspan></text><text x="250.17486338797815" y="321.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-09</tspan></text><text x="177.33333333333334" y="321.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-07</tspan></text><text x="105.66666666666667" y="321.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-05</tspan></text><text x="34" y="321.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-03</tspan></text><path fill="#e9d9ab" stroke="none" d="M34,96C61.021857923497265,122.625,115.0655737704918,202.5,142.08743169398906,202.5C169.10928961748633,202.5,223.15300546448088,109.38524590163935,250.17486338797815,96C276.9030054644809,82.76024590163935,330.35928961748635,100.4375,357.08743169398906,96C383.8155737704918,91.5625,437.27185792349724,69.375,464,60.5L464,309L34,309Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#eac459" d="M34,96C61.021857923497265,122.625,115.0655737704918,202.5,142.08743169398906,202.5C169.10928961748633,202.5,223.15300546448088,109.38524590163935,250.17486338797815,96C276.9030054644809,82.76024590163935,330.35928961748635,100.4375,357.08743169398906,96C383.8155737704918,91.5625,437.27185792349724,69.375,464,60.5" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="34" cy="96" r="7" fill="#eac459" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="142.08743169398906" cy="202.5" r="4" fill="#eac459" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="250.17486338797815" cy="96" r="4" fill="#eac459" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="357.08743169398906" cy="96" r="4" fill="#eac459" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="464" cy="60.5" r="4" fill="#eac459" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#9bc7e5" stroke="none" d="M34,202.5C61.021857923497265,211.375,115.0655737704918,233.5625,142.08743169398906,238C169.10928961748633,242.4375,223.15300546448088,242.46174863387978,250.17486338797815,238C276.9030054644809,233.58674863387978,330.35928961748635,206.9375,357.08743169398906,202.5C383.8155737704918,198.0625,437.27185792349724,202.5,464,202.5L464,309L34,309Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#4aa9e9" d="M34,202.5C61.021857923497265,211.375,115.0655737704918,233.5625,142.08743169398906,238C169.10928961748633,242.4375,223.15300546448088,242.46174863387978,250.17486338797815,238C276.9030054644809,233.58674863387978,330.35928961748635,206.9375,357.08743169398906,202.5C383.8155737704918,198.0625,437.27185792349724,202.5,464,202.5" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="34" cy="202.5" r="7" fill="#4aa9e9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="142.08743169398906" cy="238" r="4" fill="#4aa9e9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="250.17486338797815" cy="238" r="4" fill="#4aa9e9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="357.08743169398906" cy="202.5" r="4" fill="#4aa9e9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="464" cy="202.5" r="4" fill="#4aa9e9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 3px; top: 114px;"></div></div>
                                    </div>
                                </div>
                            </div>   
    	</div>
    </div>
</div>

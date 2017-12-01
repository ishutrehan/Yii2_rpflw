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
        
      <!-- Start Chart -->  

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
                                        <div id="graph-donut"></div>
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
                                        <div id="graph-area-line"></div>
                                    </div>
                                </div>
                            </div>



    	</div>


     <!--  End Chart -->







    </div>
</div>

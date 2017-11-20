<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Sales';
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
    <div class="row">
        <div class="container">
            <?= Html::a('Add New Sale', ['create'], ['class' => 'btn btn-success adbtn']) ?>
            <div class="list-page">
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading panel-border">
                                Convertable Data Table
                                <span class="tools pull-right">
                                    <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                                    <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="close-box fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table convert-data-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                OrderDate
                                            </th>
                                            <th>
                                                Customer FirstName
                                            </th>
                                            <th>
                                                Customer LastName
                                            </th>
                                            <th>
                                                Job Number
                                            </th>
                                            <th>
                                                Products Sold
                                            </th>
                                            <th>
                                                Commission Amount
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Finalize Date
                                            </th>
                                            <th>
                                                Notes
                                            </th>
                                            <th>
                                                Unpaid
                                            </th>
                                            <th>
                                                Invoice
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($model as $key => $value) {
                                        echo'<tr>';
                                            echo'<td>';
                                                echo $value['order_date'];
                                            echo"</td>";
                                            echo'<td>';
                                                echo $value['firstname'];
                                            echo"</td>";
                                            echo'<td>';
                                                echo $value['lastname'];
                                            echo"</td>";
                                            echo'<td>';
                                                echo $value['jobnumber'];
                                            echo"</td>";
                                            echo'<td>';
                                                echo $value['products_sold'];
                                            echo"</td>";
                                            echo'<td>';
                                                echo $value['commission_amt'];
                                            echo"</td>";
                                            echo'<td>';
                                                echo $value['status'];
                                            echo"</td>";
                                            echo'<td>';
                                                echo $value['finalize_date'];
                                            echo"</td>";
                                            echo'<td>';
                                                echo $value['note'];
                                            echo"</td>";
                                            echo'<td>';
                                                echo $value['payment_status'];
                                            echo"</td>";
                                            echo'<td>';
                                                // if($value['payment_status'] == 'Paid') {
                                                    echo Html::a('Download', ['rep/invoice', "id"=>$value['id']], ['class' => 'download-lnk']);
                                                // }
                                            echo"</td>";
                                        echo"</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
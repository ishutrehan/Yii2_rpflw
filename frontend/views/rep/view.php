<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RepForm */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rep Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rep-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'order_date',
            'firstname',
            'lastname',
            'jobnumber',
            'products_sold',
            'commission_amt',
            'status',
            'finalize_date',
            'note:ntext',
        ],
    ]) ?>

</div>

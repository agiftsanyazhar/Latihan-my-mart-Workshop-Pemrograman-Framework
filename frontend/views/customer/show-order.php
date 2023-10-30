<?php

use frontend\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\CustomerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Customer Order';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $data, // Assuming $data is an array of models
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'order_id',
            'customer_name',
            'order_date',
            'item_name',
            'item_price',
            'category_name',
        ],
    ]); ?>


</div>
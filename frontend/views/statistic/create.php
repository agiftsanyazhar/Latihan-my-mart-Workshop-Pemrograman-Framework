<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Statistic $model */

$this->title = 'Create Statistic';
$this->params['breadcrumbs'][] = ['label' => 'Statistics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

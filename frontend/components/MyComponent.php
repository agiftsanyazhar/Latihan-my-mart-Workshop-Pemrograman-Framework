<?php

namespace frontend\components;

use frontend\models\Statistic;
use Yii;
use yii\base\Component;

class MyComponent extends Component
{
    const EVENT_AFTER_SOMETHING = 'after-something';

    static function myHandler()
    {
        $model = new Statistic();

        $model->access_time = date("Y-m-d H:i:s");
        $model->user_ip = Yii::$app->request->userIP;
        $model->user_host = Yii::$app->request->hostInfo;
        $model->path_info = Yii::$app->request->pathInfo;
        $model->query_string = Yii::$app->request->queryString;

        $model->save();
    }
}

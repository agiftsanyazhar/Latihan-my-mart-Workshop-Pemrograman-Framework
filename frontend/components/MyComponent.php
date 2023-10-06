<?php

namespace frontend\components;

use Yii;
use yii\base\Component;

class MyComponent extends Component
{
    const EVENT_AFTER_SOMETHING = 'after-something';

    static function myHandler()
    {
        echo "<script>console.log('An event occured')</script>";

        $data = [
            'accessTime' => date("Y-m-d H:i:s"),
            'ip' => Yii::$app->request->userIP,
            'host' => Yii::$app->request->hostInfo,
            'pathInfo' => Yii::$app->request->pathInfo,
            'queryString' => Yii::$app->request->queryString,
        ];

        Yii::$app->runAction('statistic/create', [
            'accessTime' => $data['accessTime'],
            'ip' => $data['ip'],
            'host' => $data['host'],
            'pathInfo' => $data['pathInfo'],
            'queryString' => $data['queryString'],
        ]);
    }
}

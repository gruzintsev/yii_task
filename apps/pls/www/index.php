<?php

// include Yii bootstrap file
require_once(dirname(__FILE__).'/../../../vendor/yiisoft/yii/framework/yii.php');

// create a Web application instance and run
Yii::createWebApplication(dirname(__DIR__) . '/protected/config/main.php')->run();
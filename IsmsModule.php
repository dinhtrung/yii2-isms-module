<?php

namespace dinhtrung\isms;

use yii\console\Application;
class IsmsModule extends \yii\base\Module
{
    public $controllerNamespace = 'dinhtrung\isms\controllers';

    public function init()
    {
        parent::init();

        if (\Yii::$app instanceof Application){
        	$this->controllerNamespace = 'dinhtrung\isms\commands';
        }

        \Yii::$app->getI18n()->translations['*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . '/messages',
        ];
    }
}

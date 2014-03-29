<?php

namespace vendor\dinhtrung\isms;

class IsmsModule extends \yii\base\Module
{
    public $controllerNamespace = 'vendor\dinhtrung\isms\controllers';

    public function init()
    {
        parent::init();

        \Yii::$app->getI18n()->translations['*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . '/messages',
        ];
    }
}

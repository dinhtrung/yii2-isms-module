<?php

namespace dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 */
class Template extends \yii\db\ActiveRecord
{
	public static function getDb(){
		return \Yii::$app->ismsDb;
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['title'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('isms', 'ID'),
            'title' => Yii::t('isms', 'Title'),
            'body' => Yii::t('isms', 'Body'),
        ];
    }
}

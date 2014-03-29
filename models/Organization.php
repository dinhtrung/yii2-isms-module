<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    public static function getDb(){
    	return \Yii::$app->ismsDb;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255]
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
            'description' => Yii::t('isms', 'Description'),
        ];
    }
}

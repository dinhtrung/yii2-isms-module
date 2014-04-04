<?php

namespace dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "ftpsetting".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $hostname
 * @property string $username
 * @property string $password
 * @property string $path
 */
class Ftpsetting extends \yii\db\ActiveRecord
{
	public static function getDb(){
		return \Yii::$app->ismsDb;
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ftpsetting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'hostname', 'username', 'password'], 'required'],
            [['description'], 'string'],
            [['title', 'path'], 'string', 'max' => 255],
            [['hostname', 'username', 'password'], 'string', 'max' => 40]
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
            'hostname' => Yii::t('isms', 'Hostname'),
            'username' => Yii::t('isms', 'Username'),
            'password' => Yii::t('isms', 'Password'),
            'path' => Yii::t('isms', 'Path'),
        ];
    }
    /**
     * Return the option list suitable for dropDownList
     */
    public static function options($q = NULL){
      return \yii\helpers\ArrayHelper::map(self::find()->where($q)->all(), 'id', 'title');
    }
}

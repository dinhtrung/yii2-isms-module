<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "emailsetting".
 *
 * @property integer $id
 * @property string $hostname
 * @property string $email
 * @property string $password
 * @property string $option
 */
class Mailbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emailsetting';
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
            [['hostname', 'email', 'password', 'option'], 'required'],
            [['hostname'], 'string', 'max' => 40],
            [['email', 'password', 'option'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('isms', 'ID'),
            'hostname' => Yii::t('isms', 'Hostname'),
            'email' => Yii::t('isms', 'Email'),
            'password' => Yii::t('isms', 'Password'),
            'option' => Yii::t('isms', 'Option'),
        ];
    }
}

<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "smsorder".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $userid
 * @property integer $createtime
 * @property integer $updatetime
 * @property integer $status
 * @property string $expired
 * @property string $smscount
 */
class Order extends \yii\db\ActiveRecord
{
	public static function getDb(){
		return \Yii::$app->ismsDb;
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smsorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'userid', 'createtime', 'updatetime', 'status', 'expired', 'smscount'], 'required'],
            [['description'], 'string'],
            [['userid', 'createtime', 'updatetime', 'status', 'smscount'], 'integer'],
            [['expired'], 'safe'],
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
            'userid' => Yii::t('isms', 'Userid'),
            'createtime' => Yii::t('isms', 'Createtime'),
            'updatetime' => Yii::t('isms', 'Updatetime'),
            'status' => Yii::t('isms', 'Status'),
            'expired' => Yii::t('isms', 'Expired'),
            'smscount' => Yii::t('isms', 'Smscount'),
        ];
    }
}

<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "ftpfilename".
 *
 * @property integer $cid
 * @property string $filename
 * @property integer $status
 *
 * @property Campaign $c
 */
class Ftpfilename extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ftpfilename';
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
            [['cid', 'filename', 'status'], 'required'],
            [['cid', 'status'], 'integer'],
            [['filename'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => Yii::t('isms', 'Cid'),
            'filename' => Yii::t('isms', 'Filename'),
            'status' => Yii::t('isms', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Campaign::className(), ['id' => 'cid']);
    }
}

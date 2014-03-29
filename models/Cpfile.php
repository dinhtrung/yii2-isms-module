<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "cpfile".
 *
 * @property integer $cid
 * @property integer $fid
 * @property integer $status
 *
 * @property Campaign $c
 * @property Datafile $f
 */
class Cpfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cpfile';
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
            [['cid', 'fid', 'status'], 'required'],
            [['cid', 'fid', 'status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => Yii::t('isms', 'Cid'),
            'fid' => Yii::t('isms', 'Fid'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getF()
    {
        return $this->hasOne(Datafile::className(), ['fid' => 'fid']);
    }
}

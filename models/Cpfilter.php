<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "cpfilter".
 *
 * @property integer $cid
 * @property integer $fid
 * @property integer $type
 *
 * @property Campaign $c
 * @property Filter $f
 */
class Cpfilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cpfilter';
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
            [['cid', 'fid', 'type'], 'required'],
            [['cid', 'fid', 'type'], 'integer']
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
            'type' => Yii::t('isms', 'Type'),
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
        return $this->hasOne(Filter::className(), ['id' => 'fid']);
    }
}

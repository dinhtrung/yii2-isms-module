<?php

namespace dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "cpworktime".
 *
 * @property integer $cid
 * @property integer $tid
 *
 * @property Campaign $c
 * @property Worktime $t
 */
class Cpworktime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cpworktime';
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
            [['cid', 'tid'], 'required'],
            [['cid', 'tid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => Yii::t('isms', 'Cid'),
            'tid' => Yii::t('isms', 'Tid'),
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
    public function getT()
    {
        return $this->hasOne(Worktime::className(), ['id' => 'tid']);
    }
}

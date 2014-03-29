<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "worktime".
 *
 * @property integer $id
 * @property string $start
 * @property string $end
 *
 * @property Cpworktime $cpworktime
 * @property Campaign[] $cs
 */
class Worktime extends \yii\db\ActiveRecord
{
	public static function getDb(){
		return \Yii::$app->ismsDb;
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worktime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start', 'end'], 'required'],
            [['start', 'end'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('isms', 'ID'),
            'start' => Yii::t('isms', 'Start'),
            'end' => Yii::t('isms', 'End'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpworktime()
    {
        return $this->hasOne(Cpworktime::className(), ['tid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCs()
    {
        return $this->hasMany(Campaign::className(), ['id' => 'cid'])->viaTable('cpworktime', ['tid' => 'id']);
    }
}

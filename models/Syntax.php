<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "syntax".
 *
 * @property integer $fid
 * @property string $syntax
 * @property integer $type
 *
 * @property Filter $f
 */
class Syntax extends \yii\db\ActiveRecord
{
	public static function getDb(){
		return \Yii::$app->ismsDb;
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'syntax';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'type'], 'required'],
            [['fid', 'type'], 'integer'],
            [['syntax'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => Yii::t('isms', 'Fid'),
            'syntax' => Yii::t('isms', 'Syntax'),
            'type' => Yii::t('isms', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getF()
    {
        return $this->hasOne(Filter::className(), ['id' => 'fid']);
    }
}

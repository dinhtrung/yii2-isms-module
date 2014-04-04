<?php

namespace dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "blacklist".
 *
 * @property integer $fid
 * @property string $isdn
 */
class Blacklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blacklist';
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
            [['fid'], 'required'],
            [['fid'], 'integer'],
            [['isdn'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => Yii::t('isms', 'Fid'),
            'isdn' => Yii::t('isms', 'Isdn'),
        ];
    }
}

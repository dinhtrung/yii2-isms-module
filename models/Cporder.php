<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "cporder".
 *
 * @property integer $cid
 * @property integer $oid
 * @property string $smsblock
 */
class Cporder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cporder';
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
            [['cid', 'oid'], 'required'],
            [['cid', 'oid', 'smsblock'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => Yii::t('isms', 'Cid'),
            'oid' => Yii::t('isms', 'Oid'),
            'smsblock' => Yii::t('isms', 'Smsblock'),
        ];
    }
}

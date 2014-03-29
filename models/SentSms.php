<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "sent_sms".
 *
 * @property string $momt
 * @property string $sender
 * @property string $receiver
 * @property string $udhdata
 * @property string $msgdata
 * @property string $time
 * @property string $smsc_id
 * @property string $service
 * @property string $account
 * @property string $id
 * @property string $sms_type
 * @property string $mclass
 * @property string $mwi
 * @property string $coding
 * @property string $compress
 * @property string $validity
 * @property string $deferred
 * @property string $dlr_mask
 * @property string $dlr_url
 * @property string $pid
 * @property string $alt_dcs
 * @property string $rpi
 * @property string $charset
 * @property string $boxc_id
 * @property string $binfo
 * @property integer $campaign_id
 * @property string $meta_data
 * @property integer $dlr
 */
class SentSms extends \yii\db\ActiveRecord
{
	public static function getDb(){
		return \Yii::$app->ismsDb;
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sent_sms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['momt', 'udhdata', 'msgdata', 'meta_data'], 'string'],
            [['time'], 'required'],
            [['time'], 'safe'],
            [['id', 'sms_type', 'mclass', 'mwi', 'coding', 'compress', 'validity', 'deferred', 'dlr_mask', 'pid', 'alt_dcs', 'rpi', 'campaign_id', 'dlr'], 'integer'],
            [['sender', 'receiver'], 'string', 'max' => 20],
            [['smsc_id', 'service', 'account', 'dlr_url', 'charset', 'boxc_id', 'binfo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'momt' => Yii::t('isms', 'Momt'),
            'sender' => Yii::t('isms', 'Sender'),
            'receiver' => Yii::t('isms', 'Receiver'),
            'udhdata' => Yii::t('isms', 'Udhdata'),
            'msgdata' => Yii::t('isms', 'Msgdata'),
            'time' => Yii::t('isms', 'Time'),
            'smsc_id' => Yii::t('isms', 'Smsc ID'),
            'service' => Yii::t('isms', 'Service'),
            'account' => Yii::t('isms', 'Account'),
            'id' => Yii::t('isms', 'ID'),
            'sms_type' => Yii::t('isms', 'Sms Type'),
            'mclass' => Yii::t('isms', 'Mclass'),
            'mwi' => Yii::t('isms', 'Mwi'),
            'coding' => Yii::t('isms', 'Coding'),
            'compress' => Yii::t('isms', 'Compress'),
            'validity' => Yii::t('isms', 'Validity'),
            'deferred' => Yii::t('isms', 'Deferred'),
            'dlr_mask' => Yii::t('isms', 'Dlr Mask'),
            'dlr_url' => Yii::t('isms', 'Dlr Url'),
            'pid' => Yii::t('isms', 'Pid'),
            'alt_dcs' => Yii::t('isms', 'Alt Dcs'),
            'rpi' => Yii::t('isms', 'Rpi'),
            'charset' => Yii::t('isms', 'Charset'),
            'boxc_id' => Yii::t('isms', 'Boxc ID'),
            'binfo' => Yii::t('isms', 'Binfo'),
            'campaign_id' => Yii::t('isms', 'Campaign ID'),
            'meta_data' => Yii::t('isms', 'Meta Data'),
            'dlr' => Yii::t('isms', 'Dlr'),
        ];
    }
}

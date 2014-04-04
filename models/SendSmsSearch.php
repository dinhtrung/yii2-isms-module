<?php

namespace dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use dinhtrung\isms\models\SendSms;

/**
 * SendSmsSearch represents the model behind the search form about `dinhtrung\isms\models\SendSms`.
 */
class SendSmsSearch extends Model
{
    public $momt;
    public $sender;
    public $receiver;
    public $udhdata;
    public $msgdata;
    public $time;
    public $smsc_id;
    public $service;
    public $account;
    public $id;
    public $sms_type;
    public $mclass;
    public $mwi;
    public $coding;
    public $compress;
    public $validity;
    public $deferred;
    public $dlr_mask;
    public $dlr_url;
    public $pid;
    public $alt_dcs;
    public $rpi;
    public $charset;
    public $boxc_id;
    public $binfo;
    public $meta_data;
    public $campaign_id;

    public function rules()
    {
        return [
            [['momt', 'sender', 'receiver', 'udhdata', 'msgdata', 'time', 'smsc_id', 'service', 'account', 'dlr_url', 'charset', 'boxc_id', 'binfo', 'meta_data'], 'safe'],
            [['id', 'sms_type', 'mclass', 'mwi', 'coding', 'compress', 'validity', 'deferred', 'dlr_mask', 'pid', 'alt_dcs', 'rpi', 'campaign_id'], 'integer'],
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
            'meta_data' => Yii::t('isms', 'Meta Data'),
            'campaign_id' => Yii::t('isms', 'Campaign ID'),
        ];
    }

    public function search($params)
    {
        $query = SendSms::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'momt', true);
        $this->addCondition($query, 'sender', true);
        $this->addCondition($query, 'receiver', true);
        $this->addCondition($query, 'udhdata', true);
        $this->addCondition($query, 'msgdata', true);
        $this->addCondition($query, 'time');
        $this->addCondition($query, 'smsc_id', true);
        $this->addCondition($query, 'service', true);
        $this->addCondition($query, 'account', true);
        $this->addCondition($query, 'id');
        $this->addCondition($query, 'sms_type');
        $this->addCondition($query, 'mclass');
        $this->addCondition($query, 'mwi');
        $this->addCondition($query, 'coding');
        $this->addCondition($query, 'compress');
        $this->addCondition($query, 'validity');
        $this->addCondition($query, 'deferred');
        $this->addCondition($query, 'dlr_mask');
        $this->addCondition($query, 'dlr_url', true);
        $this->addCondition($query, 'pid');
        $this->addCondition($query, 'alt_dcs');
        $this->addCondition($query, 'rpi');
        $this->addCondition($query, 'charset', true);
        $this->addCondition($query, 'boxc_id', true);
        $this->addCondition($query, 'binfo', true);
        $this->addCondition($query, 'meta_data', true);
        $this->addCondition($query, 'campaign_id');
        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }

        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }
        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}

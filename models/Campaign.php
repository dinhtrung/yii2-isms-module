<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "campaign".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $createtime
 * @property integer $updatetime
 * @property string $codename
 * @property string $request_date
 * @property string $request_owner
 * @property string $datasender
 * @property string $tosubscriber
 * @property string $start
 * @property string $end
 * @property integer $status
 * @property integer $finished
 * @property integer $approved
 * @property integer $active
 * @property string $sender
 * @property integer $ready
 * @property integer $org
 * @property integer $type
 * @property integer $throughput
 * @property integer $col
 * @property integer $isdncol
 * @property string $template
 * @property integer $priority
 * @property integer $velocity
 * @property string $cpworkday
 * @property integer $emailbox
 * @property string $esubject
 * @property string $eattachment
 * @property integer $ftpserver
 * @property string $smsimport
 * @property integer $blockimport
 * @property integer $limit_exceeded
 * @property string $send
 * @property string $blocksend
 * @property string $sent
 * @property string $blocksent
 * @property integer $orderid
 * @property integer $exported
 *
 * @property Cpfile $cpfile
 * @property Datafile[] $fs
 * @property Cpfilter $cpfilter
 * @property Cpworktime $cpworktime
 * @property Worktime[] $ts
 * @property Ftpfilename $ftpfilename
 */
class Campaign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campaign';
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
            [['description', 'tosubscriber', 'template'], 'string'],
            [['createtime', 'updatetime', 'status', 'finished', 'approved', 'active', 'ready', 'org', 'type', 'throughput', 'col', 'isdncol', 'priority', 'velocity', 'emailbox', 'ftpserver', 'smsimport', 'blockimport', 'limit_exceeded', 'send', 'blocksend', 'sent', 'blocksent', 'orderid', 'exported'], 'integer'],
            [['request_date', 'start', 'end'], 'safe'],
            [['active', 'isdncol', 'cpworkday'], 'required'],
            [['title', 'request_owner'], 'string', 'max' => 40],
            [['codename', 'sender'], 'string', 'max' => 20],
            [['datasender'], 'string', 'max' => 80],
            [['cpworkday'], 'string', 'max' => 10],
            [['esubject', 'eattachment'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('isms', 'ID'),
            'title' => Yii::t('isms', 'Title'),
            'description' => Yii::t('isms', 'Description'),
            'createtime' => Yii::t('isms', 'Createtime'),
            'updatetime' => Yii::t('isms', 'Updatetime'),
            'codename' => Yii::t('isms', 'Codename'),
            'request_date' => Yii::t('isms', 'Request Date'),
            'request_owner' => Yii::t('isms', 'Request Owner'),
            'datasender' => Yii::t('isms', 'Datasender'),
            'tosubscriber' => Yii::t('isms', 'Tosubscriber'),
            'start' => Yii::t('isms', 'Start'),
            'end' => Yii::t('isms', 'End'),
            'status' => Yii::t('isms', 'Status'),
            'finished' => Yii::t('isms', 'Finished'),
            'approved' => Yii::t('isms', 'Approved'),
            'active' => Yii::t('isms', 'Active'),
            'sender' => Yii::t('isms', 'Sender'),
            'ready' => Yii::t('isms', 'Ready'),
            'org' => Yii::t('isms', 'Org'),
            'type' => Yii::t('isms', 'Type'),
            'throughput' => Yii::t('isms', 'Throughput'),
            'col' => Yii::t('isms', 'Col'),
            'isdncol' => Yii::t('isms', 'Isdncol'),
            'template' => Yii::t('isms', 'Template'),
            'priority' => Yii::t('isms', 'Priority'),
            'velocity' => Yii::t('isms', 'Velocity'),
            'cpworkday' => Yii::t('isms', 'Cpworkday'),
            'emailbox' => Yii::t('isms', 'Emailbox'),
            'esubject' => Yii::t('isms', 'Esubject'),
            'eattachment' => Yii::t('isms', 'Eattachment'),
            'ftpserver' => Yii::t('isms', 'Ftpserver'),
            'smsimport' => Yii::t('isms', 'Smsimport'),
            'blockimport' => Yii::t('isms', 'Blockimport'),
            'limit_exceeded' => Yii::t('isms', 'Limit Exceeded'),
            'send' => Yii::t('isms', 'Send'),
            'blocksend' => Yii::t('isms', 'Blocksend'),
            'sent' => Yii::t('isms', 'Sent'),
            'blocksent' => Yii::t('isms', 'Blocksent'),
            'orderid' => Yii::t('isms', 'Orderid'),
            'exported' => Yii::t('isms', 'Exported'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpfile()
    {
        return $this->hasOne(Cpfile::className(), ['cid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFs()
    {
        return $this->hasMany(Datafile::className(), ['fid' => 'fid'])->viaTable('cpfile', ['cid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpfilter()
    {
        return $this->hasOne(Cpfilter::className(), ['cid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpworktime()
    {
        return $this->hasOne(Cpworktime::className(), ['cid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTs()
    {
        return $this->hasMany(Worktime::className(), ['id' => 'tid'])->viaTable('cpworktime', ['cid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFtpfilename()
    {
        return $this->hasOne(Ftpfilename::className(), ['cid' => 'id']);
    }
}

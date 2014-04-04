<?php

namespace dinhtrung\isms\models;

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
	public $acceptFilters;
	public $denyFilters;
	public $datafiles;
	private $dir;
	public $cpworktimes;
	public $ftpfilenames = array();
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%campaign}}';
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

    /**
     * Attribute alias helper function
     */
    const THROUGHPUT_LOWEST = 20;
    const THROUGHPUT_LOWER	= 40;
    const THROUGHPUT_LOW	= 60;
    const THROUGHPUT_MEDIUM	= 80;
    const THROUGHPUT_HIGH	= 100;
    const THROUGHPUT_HIGHER	= 120;
    const THROUGHPUT_HIGHEST= 140;
    public static function throughputOptions($param = NULL) {
    	$options = array(
    			self::THROUGHPUT_LOWEST => Yii::t('isms', 'Minimum speed'),
    			self::THROUGHPUT_LOWER	=> Yii::t('isms', 'Lower speed'),
    			self::THROUGHPUT_LOW	=> Yii::t('isms', 'Low speed'),
    			self::THROUGHPUT_MEDIUM	=> Yii::t('isms', 'Normal speed'),
    			self::THROUGHPUT_HIGH	=> Yii::t('isms', 'High speed'),
    			self::THROUGHPUT_HIGHER	=> Yii::t('isms', 'Higher speed'),
    			self::THROUGHPUT_HIGHEST=> Yii::t('isms', 'Highest speed'),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; } }
    	elseif (array_key_exists((string) $param, $options)) return $options[(string) $param];
    	else return NULL;
    }
    /*
     * Velocity : Number of records per selection of Sqlbox
    */
    const VELOCITY = 150;
    public static function velocityOption($param = NULL) {
    	$options = array(
    			self::VELOCITY => Yii::t('isms', 'SMS per routine'),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; } }
    	elseif (array_key_exists((string) $param, $options)) return $options[(string) $param];
    	else return NULL;
    }
    /*
     * Velocity : Number of records per selection of Sqlbox
    */
    const PRIORITY_LOWEST 	= 0;
    const PRIORITY_LOWER	= 1;
    const PRIORITY_LOW		= 2;
    const PRIORITY_MEDIUM	= 3;
    const PRIORITY_HIGH		= 4;
    const PRIORITY_HIGHER	= 5;
    const PRIORITY_HIGHEST	= 6;
    public static function priorityOption($param = NULL) {
    	$options = array(
    			self::PRIORITY_LOWEST => Yii::t('isms', 'Minimum priority'),
    			self::PRIORITY_LOWER	=> Yii::t('isms', 'Lower priority'),
    			self::PRIORITY_LOW	=> Yii::t('isms', 'Low priority'),
    			self::PRIORITY_MEDIUM	=> Yii::t('isms', 'Normal priority'),
    			self::PRIORITY_HIGH	=> Yii::t('isms', 'High priority'),
    			self::PRIORITY_HIGHER	=> Yii::t('isms', 'Higher priority'),
    			self::PRIORITY_HIGHEST=> Yii::t('isms', 'Highest priority'),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; }
    	elseif (array_key_exists((string) $param, $options)) return $options[(string) $param];
    	else return NULL;
    }

    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    public static function statusOptions($param = NULL) {
    	$options = array(
    			self::STATUS_ENABLE		=>	Yii::t('isms', "Enabled"),
    			self::STATUS_DISABLE	=>	Yii::t('isms', "Disabled"),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; }
    	elseif (array_key_exists((string) $param, $options)) return $options[(string) $param];
    	else return NULL;
    }

    const FINISHED_TRUE 	= 1;
    const FINISHED_FALSE	= 0;

    public static function finishedOptions($param = NULL) {
    	$options = array(
    			self::FINISHED_FALSE		=>	Yii::t('isms', "Not finished"),
    			self::FINISHED_TRUE	=>	Yii::t('isms', "Has Finished"),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; }
    	elseif (array_key_exists((string) $param, $options)) return $options[(string) $param];
    	else return NULL;
    }

    const APPROVED_TRUE = 1;
    const APPROVED_FALSE= 0;
    public static function approvedOptions($param = NULL) {
    	$options = array(
    			self::APPROVED_FALSE	=>	Yii::t('isms', "Not Approved"),
    			self::APPROVED_TRUE		=>	Yii::t('isms', "Approved Okay"),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; }
    	elseif (array_key_exists((string) $param, $options)) return $options[(string) $param];
    	else return NULL;
    }

    const ACTIVE_PENDING = 0;
    const ACTIVE_RUNNING = 1;
    public static function activeOptions($param = NULL) {
    	$options = array(
    			self::ACTIVE_PENDING	=>	Yii::t('isms', "Not Activated"),
    			self::ACTIVE_RUNNING	=>	Yii::t('isms', "Activated"),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; }
    	elseif (array_key_exists((string) $param, $options)) return $options[(string) $param];
    	else return NULL;
    }

    const LIMIT_EXCEEDED = 1;
    const LIMIT_AVAILABLE = 0;
    public static function limit_exceededOptions($param = NULL) {
    	$options = array(
    			self::LIMIT_AVAILABLE	=>	Yii::t('isms', "SMS Order can be charged."),
    			self::LIMIT_EXCEEDED	=>	Yii::t('isms', "More SMS Order required..."),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; }
    	elseif (array_key_exists((string) $param, $options)) return $options[(string) $param];
    	else return NULL;
    }

    const READY_NOTYET	= 0;
    const READY_IMPORT	= 1;
    const READY_ALL		= 2;
    public static function readyOptions($param = NULL) {
    	$options = array(
    			self::READY_NOTYET		=>	Yii::t('isms', "No data imported"),
    			self::READY_IMPORT		=>	Yii::t('isms', "Has data imported, but not filtered."),
    			self::READY_ALL			=>	Yii::t('isms', "Finished import files, ready to run."),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; }
    	elseif (array_key_exists((string) $param, $options)) return $options[(string) $param];
    	else return NULL;
    }

    public static function cpweekdayOptions($param = NULL) {
    	$options = array(
    			1	=>	Yii::t('app', "Sunday"),
    			2	=>	Yii::t('app', "Monday"),
    			3	=>	Yii::t('app', "Tuesday"),
    			4	=>	Yii::t('app', "Wednesday"),
    			5	=>	Yii::t('app', "Thursday"),
    			6	=>	Yii::t('app', "Friday"),
    			7	=>	Yii::t('app', "Saturday"),
    	);
    	if (is_null($param)) { foreach ($options as $k => $v) $options[$k] = strip_tags($v); return $options; }
    	elseif (array_key_exists((int) $param, $options)) return $options[(int) $param];
    	else return NULL;
    }
    public function getSent(){
    	if ($this->getPrimaryKey()){
    		if (! is_null($this->sent) AND ($this->finished == self::FINISHED_TRUE) AND ($this->sent != 0)) return $this->sent;
    		$this->sent = $this->getDb()->createCommand("SELECT COUNT(*) FROM sent_sms WHERE campaign_id = " . $this->getPrimaryKey() . " AND ((dlr IS NULL) OR (dlr = 1))")
    		->queryScalar();
    		if ($this->finished == self::FINISHED_TRUE){
    			$sent = intval($this->sent);
    			$this->getDb()->createCommand('UPDATE campaign SET sent='.$sent.' WHERE id='.$this->getPrimaryKey())->execute();
    		}
    		return $this->sent;
    	}
    	else return NULL;
    }

    public function getBlocksent(){
    	if ($this->getPrimaryKey()){
    		if (! is_null($this->blocksent) AND ($this->finished == self::FINISHED_TRUE) AND ($this->blocksent != 0)) return $this->blocksent;
    		if (strpos($this->template, '{') === FALSE){
    			$this->blocksent = ceil(strlen($this->template) / 160) * $this->getSent();
    		} else {
    			$this->blocksent = $this->getDb()->createCommand( "SELECT SUM(CEIL(CHAR_LENGTH(URLDECODE(msgdata))/160)) AS count FROM {{sent_sms}} WHERE campaign_id = :id AND ((dlr IS NULL) OR (dlr = 1))")->queryScalar(array(':id' => $this->id));
    		}
    		if ($this->finished == self::FINISHED_TRUE){
    			$sent = intval($this->blocksent);
    			$this->getDb()->createCommand('UPDATE campaign SET blocksent='.$sent.' WHERE id='.$this->getPrimaryKey())->execute();
    			$this->getDb()->createCommand('UPDATE cporder SET smsblock=0 WHERE cid='.$this->getPrimaryKey())->execute();
    			$orders = Cporder::model()->with('o')->findAllByAttributes(array('cid' => $this->getPrimaryKey()));
    			$quota = 0;
    			foreach ($orders as $o){
    				$smsorder = $o->getRelated('o', TRUE);
    				if ($smsorder instanceof Smsorder)
    					$quota += $smsorder->getSmsleft();
    			}
    			if ($sent > $quota)
    				$this->limit_exceeded = Campaign::LIMIT_EXCEEDED;
    			else {
    				foreach ($orders as $o){
    					$smsorder = $o->getRelated('o', TRUE);
    					if (! ($smsorder instanceof Smsorder)) continue;
    					$t = $smsorder->getSmsleft();	// so block SMS con lai cua don hang
    					if ($t <= $sent){		// Don hang khong du?
    						$o->smsblock = $t;
    					} else {
    						$o->smsblock = $sent;	// Don hang du?
    					}
    					$sent -= $o->smsblock;
    					$o->save();
    				}
    				$this->limit_exceeded = Campaign::LIMIT_AVAILABLE;
    			}
    		}
    		return $this->blocksent;
    	}
    	return NULL;
    }


    public function getSend(){
    	if ($this->getPrimaryKey()){
    		if (! is_null($this->send) AND ($this->finished == self::FINISHED_TRUE)) return $this->send;
    		$this->send = $this->getDb()->createCommand("SELECT COUNT(*) FROM send_sms WHERE campaign_id = " . $this->getPrimaryKey())
    		->queryScalar();
    		if ($this->finished == self::FINISHED_TRUE)
    			$this->getDb()->createCommand('UPDATE campaign SET send='.intval($this->send).' WHERE id='.$this->getPrimaryKey())->execute();
    		return $this->send;
    	}
    	else return NULL;
    }

    public function getBlocksend(){
    	if ($this->getPrimaryKey()){
    		if (! is_null($this->blocksend) AND ($this->finished == self::FINISHED_TRUE))  return $this->blocksend;
    		if (strpos($this->template, '{') === FALSE){
    			$this->blocksend = ceil(strlen($this->template) / 160) * $this->getSend();
    		} else {
    			$this->blocksend = $this->getDb()->createCommand( "SELECT SUM(CEIL(CHAR_LENGTH(URLDECODE(msgdata))/160)) AS count FROM {{send_sms}} WHERE campaign_id = :id")->queryScalar(array(':id' => $this->id));
    		}
    		if ($this->finished == self::FINISHED_TRUE)
    			$this->getDb()->createCommand('UPDATE campaign SET blocksend= '.intval($this->blocksend).' WHERE id = '.$this->getPrimaryKey())->execute();
    		return $this->blocksend;
    	}
    	return NULL;
    }


    public function getLimitExceeded(){
    	if ($this->getPrimaryKey()){
    		$smsblock = $this->getDb()->createCommand("SELECT SUM(smsblock) FROM cporder WHERE cid = " . $this->getPrimaryKey())->queryScalar();
    		$orderblock = $this->getDb()->createCommand("SELECT SUM(smscount) FROM smsorder LEFT JOIN cporder ON cporder.oid=smsorder.id WHERE cporder.cid = " . $this->getPrimaryKey())->queryScalar();
    		if ($this->blockimport > ($orderblock - $smsblock))
    			return self::LIMIT_EXCEEDED;
    		else
    			return self::LIMIT_AVAILABLE;
    	}
    	else return self::LIMIT_AVAILABLE;
    }
}

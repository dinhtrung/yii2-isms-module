<?php

use yii\db\Schema;

class m140331_043007_init extends \yii\db\Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	// Template
    	$this->createTable('{{%template}}', [
				'id'	=> Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'template' => Schema::TYPE_TEXT,
    	], $tableOptions);
    	// Campaign
    	$this->createTable('{{%campaign}}', [
				'id'	=> Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'created_at' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    			// Misc Information
    			'request_date' => Schema::TYPE_DATE,
    			'request_owner' => Schema::TYPE_STRING,
    			'data_sender' => Schema::TYPE_STRING,
    			'to_subscriber' => Schema::TYPE_TEXT,
    			// Timing
    			'start' => Schema::TYPE_DATETIME,
    			'end' => Schema::TYPE_DATETIME,
    			'cpworkday' => Schema::TYPE_STRING,
    			// Running Flags
    			'status' => Schema::TYPE_BOOLEAN,
    			'ready' => Schema::TYPE_BOOLEAN,
    			'approved' => Schema::TYPE_BOOLEAN,
    			'finished' => Schema::TYPE_BOOLEAN,
    			'active' => Schema::TYPE_BOOLEAN,
    			'exported' => Schema::TYPE_BOOLEAN,
    			// Campaign setting
    			'org'	=>	Schema::TYPE_INTEGER,
    			'type'	=>	Schema::TYPE_INTEGER,
    			// Campaign Control
    			'throughput'	=>	Schema::TYPE_SMALLINT,
    			'priority'		=>	Schema::TYPE_SMALLINT,
    			'velocity'		=>	Schema::TYPE_SMALLINT,
    			// SMS Content Parameters
    			'col'	=>	Schema::TYPE_SMALLINT,
    			'isdncol'	=>	Schema::TYPE_SMALLINT,
    			'template'	=>	Schema::TYPE_TEXT,
    			// SMS Email Content
    			'emailbox' 	=> Schema::TYPE_INTEGER,
    			'esubject' 	=> Schema::TYPE_STRING,
    			'eattachment' => Schema::TYPE_STRING,
    			// Data files
    			'ftpserver'	=>	Schema::TYPE_INTEGER,
    			// Order
    			'limit_exceeded'	=>	Schema::TYPE_BOOLEAN,
    			// Stastical Information
    			'smsimport' => Schema::TYPE_BIGINT,
    			'blockimport' => Schema::TYPE_BIGINT,
    			'send' => Schema::TYPE_BIGINT,
    			'blocksend' => Schema::TYPE_BIGINT,
    			'sent' => Schema::TYPE_BIGINT,
    			'blocksent' => Schema::TYPE_BIGINT,
    	], $tableOptions);
    	// Organization
    	$this->createTable('{{%organization}}', [
    			'id'	=> Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    	],$tableOptions);
    	// Send & sent sms
    	$this->createTable('{{%send_sms}}', $sms = [
			'momt' => Schema::TYPE_STRING,
			'sender' => Schema::TYPE_STRING,
			'receiver' => Schema::TYPE_STRING,
			'udhdata' => Schema::TYPE_STRING,
			'msgdata' => Schema::TYPE_STRING,
			'time' => Schema::TYPE_TIMESTAMP,
			'smsc_id' => Schema::TYPE_STRING,
			'service' => Schema::TYPE_STRING,
			'account' => Schema::TYPE_STRING,
			'id' => Schema::TYPE_STRING,
			'sms_type' => Schema::TYPE_STRING,
			'mclass' => Schema::TYPE_STRING,
			'mwi' => Schema::TYPE_STRING,
			'coding' => Schema::TYPE_STRING,
			'compress' => Schema::TYPE_STRING,
			'validity' => Schema::TYPE_STRING,
			'deferred' => Schema::TYPE_STRING,
			'dlr_mask' => Schema::TYPE_STRING,
			'dlr_url' => Schema::TYPE_STRING,
			'pid' => Schema::TYPE_STRING,
			'alt_dcs' => Schema::TYPE_STRING,
			'rpi' => Schema::TYPE_STRING,
			'charset' => Schema::TYPE_STRING,
			'boxc_id' => Schema::TYPE_STRING,
			'binfo' => Schema::TYPE_STRING,
			'campaign_id' => Schema::TYPE_INTEGER,
			'meta_data' => Schema::TYPE_STRING,
    	], $tableOptions);
    	$sms['dlr'] = Schema::TYPE_INTEGER;
    	$this->createTable('{{%sent_sms}}', $sms, $tableOptions);
    	// Datafile
    	$this->createTable('{{%datafile}}', [
    			'id'	=> Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'created_at' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    			'filename' 	=> Schema::TYPE_STRING,
    			'uri' 				=> Schema::TYPE_STRING,
    			'filemime'	=> Schema::TYPE_STRING,
    			'filesize' 	=> Schema::TYPE_STRING,
    			'status'	=> Schema::TYPE_BOOLEAN,
    	], $tableOptions);
    	$this->createTable('{{%cpfile}}', [
				'cid' => Schema::TYPE_INTEGER,
    			'fid' => Schema::TYPE_INTEGER,
    			'status' => Schema::TYPE_BOOLEAN,
    	],$tableOptions);
    	// Data filter
    	$this->createTable('{{%filter}}', [
    			'id'	=> Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			// Misc Info
    			'created_at' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    			// Reply Info
    			'reply_refuse' 	=> Schema::TYPE_STRING,
    			'reply_accept' 				=> Schema::TYPE_STRING,
    			'reply_refuse_dup' 	=> Schema::TYPE_STRING,
    			'reply_accept_dup' 				=> Schema::TYPE_STRING,
    			'reply_false_syntax'	=> Schema::TYPE_STRING,
    			// Synchronize Blacklist File
    			'ftpblack' => Schema::TYPE_INTEGER,
    			'ftpblackfile' => Schema::TYPE_STRING,
    			// Synchronize Whitelist File
    			'ftpwhite' => Schema::TYPE_INTEGER,
    			'ftpwhitefile' => Schema::TYPE_STRING,
    	],$tableOptions);
    	$this->createTable('{{%syntax}}', [
				'fid' => Schema::TYPE_INTEGER,
    			'syntax' => Schema::TYPE_STRING,
    			'type' => Schema::TYPE_BOOLEAN,
    	],$tableOptions);
    	$this->createTable('{{%blacklist}}', [
				'fid' => Schema::TYPE_INTEGER,
    			'msisdn' => Schema::TYPE_BIGINT,
    	], $tableOptions);
    	$this->createTable('{{%whitelist}}', [
    			'fid' => Schema::TYPE_INTEGER,
    			'msisdn' => Schema::TYPE_BIGINT,
    	], $tableOptions);
    	$this->createTable('{{%cpfilter}}', [
    			'cid' => Schema::TYPE_INTEGER,
    			'fid' => Schema::TYPE_INTEGER,
    			'type' => Schema::TYPE_BOOLEAN,
    	], $tableOptions);
    	// FTP file
    	$this->createTable('{{%ftpfilename}}', [
    			'cid' => Schema::TYPE_INTEGER,
    			'filename' => Schema::TYPE_STRING,
    			'status' => Schema::TYPE_BOOLEAN,
    	], $tableOptions);
    	$this->createTable('{{%ftpsetting}}', [
    			'id'	=> Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'hostname' => Schema::TYPE_STRING,
    			'username' => Schema::TYPE_STRING,
    			'password' => Schema::TYPE_STRING,
    			'path' => Schema::TYPE_STRING,
    	], $tableOptions);
    	// Email file
    	$this->createTable('{{%emailsetting}}', [
    			'id'	=> Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'hostname' => Schema::TYPE_STRING,
    			'email' => Schema::TYPE_STRING,
    			'password' => Schema::TYPE_STRING,
    			'option' => Schema::TYPE_STRING,
    	], $tableOptions);
    	// Order
    	$this->createTable('{{%smsorder}}', [
    			'id'	=> Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'created_at' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    			'status' => Schema::TYPE_BOOLEAN,
    			'expired' => Schema::TYPE_DATETIME,
    			'smscount' => Schema::TYPE_BIGINT,
    	], $tableOptions);
    	$this->createTable('{{%cporder}}', [
				'cid' => Schema::TYPE_INTEGER,
    			'oid' => Schema::TYPE_INTEGER,
    			'smsblock' => Schema::TYPE_BIGINT,
    	], $tableOptions);
    	// Worktime
    	$this->createTable('{{%worktime}}', [
    			'id' => Schema::TYPE_PK,
				'start' => Schema::TYPE_TIME,
				'end' => Schema::TYPE_TIME,
    	], $tableOptions);
    	$this->createTable('{{%cpworktime}}', [
				'cid' => Schema::TYPE_INTEGER,
    			'tid' => Schema::TYPE_INTEGER,
    	], $tableOptions);
    }

    public function down()
    {
    	// Campaign
    	// Datafile
    	$this->dropTable('{{%cpfile}}');
    	$this->dropTable('{{%datafile}}');
    	// Data filter
    	$this->dropTable('{{%cpfilter}}');
    	$this->dropTable('{{%blacklist}}');
    	$this->dropTable('{{%whitelist}}');
    	$this->dropTable('{{%syntax}}');
    	$this->dropTable('{{%filter}}');
    	// FTP file
    	$this->dropTable('{{%ftpfilename}}');
    	$this->dropTable('{{%ftpsetting}}');
    	// Email file
    	$this->dropTable('{{%emailsetting}}');
    	// Order
    	$this->dropTable('{{%cporder}}');
    	$this->dropTable('{{%smsorder}}');
    	// Worktime
    	$this->dropTable('{{%cpworktime}}');
    	$this->dropTable('{{%worktime}}');
    	// Template
    	$this->dropTable('{{%template}}');
    	// Send & sent sms
    	$this->dropTable('{{%send_sms}}');
    	$this->dropTable('{{%sent_sms}}');
    	// Organization
    	$this->dropTable('{{%organization}}');
    	// Campaign
    	$this->dropTable('{{%campaign}}');
    }
}

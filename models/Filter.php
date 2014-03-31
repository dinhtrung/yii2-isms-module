<?php

namespace vendor\dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "filter".
 *
 * @property integer $id
 * @property string $title
 * @property string $reply_refuse
 * @property string $reply_accept
 * @property string $reply_false_syntax
 * @property string $description
 * @property integer $ftpblack
 * @property string $ftpblackfile
 * @property integer $ftpwhite
 * @property string $ftpwhitefile
 * @property string $reply_accept_dup
 * @property string $reply_refuse_dup
 *
 * @property Cpfilter $cpfilter
 * @property Syntax $syntax
 */
class Filter extends \yii\db\ActiveRecord
{
	public $accept_syntax;
	public $refuse_syntax;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%filter}}';
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
            [['ftpblack', 'ftpwhite'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['reply_refuse', 'reply_accept', 'reply_false_syntax', 'description', 'reply_accept_dup', 'reply_refuse_dup'], 'string', 'max' => 256],
            [['ftpblackfile', 'ftpwhitefile'], 'string', 'max' => 255],
            [['accept_syntax', 'refuse_syntax'], 'string'],
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
            'reply_refuse' => Yii::t('isms', 'Reply Refuse'),
            'reply_accept' => Yii::t('isms', 'Reply Accept'),
            'reply_false_syntax' => Yii::t('isms', 'Reply False Syntax'),
            'description' => Yii::t('isms', 'Description'),
            'ftpblack' => Yii::t('isms', 'Ftpblack'),
            'ftpblackfile' => Yii::t('isms', 'Ftpblackfile'),
            'ftpwhite' => Yii::t('isms', 'Ftpwhite'),
            'ftpwhitefile' => Yii::t('isms', 'Ftpwhitefile'),
            'reply_accept_dup' => Yii::t('isms', 'Reply Accept Dup'),
            'reply_refuse_dup' => Yii::t('isms', 'Reply Refuse Dup'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpfilter()
    {
        return $this->hasOne(Cpfilter::className(), ['fid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSyntax()
    {
        return $this->hasOne(Syntax::className(), ['fid' => 'id']);
    }

    public function getBlacklist(){
    	return $this->hasMany(Blacklist::className(), ['fid' => 'id']);
    }
    public function getWhitelist(){
    	return $this->hasMany(Whitelist::className(), ['fid' => 'id']);
    }
}

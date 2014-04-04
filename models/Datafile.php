<?php

namespace dinhtrung\isms\models;

use Yii;

/**
 * This is the model class for table "datafile".
 *
 * @property integer $fid
 * @property string $title
 * @property string $description
 * @property string $createtime
 * @property string $filename
 * @property string $uri
 * @property string $filemime
 * @property string $filesize
 * @property integer $status
 * @property string $updatetime
 * @property string $uid
 *
 * @property Cpfile $cpfile
 * @property Campaign[] $cs
 */
class Datafile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datafile';
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
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['createtime', 'filesize', 'status', 'updatetime', 'uid'], 'integer'],
            [['title', 'filename', 'uri', 'filemime'], 'string', 'max' => 255],
            [['uri'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => Yii::t('isms', 'Fid'),
            'title' => Yii::t('isms', 'Title'),
            'description' => Yii::t('isms', 'Description'),
            'createtime' => Yii::t('isms', 'Createtime'),
            'filename' => Yii::t('isms', 'Filename'),
            'uri' => Yii::t('isms', 'Uri'),
            'filemime' => Yii::t('isms', 'Filemime'),
            'filesize' => Yii::t('isms', 'Filesize'),
            'status' => Yii::t('isms', 'Status'),
            'updatetime' => Yii::t('isms', 'Updatetime'),
            'uid' => Yii::t('isms', 'Uid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpfile()
    {
        return $this->hasOne(Cpfile::className(), ['fid' => 'fid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCs()
    {
        return $this->hasMany(Campaign::className(), ['id' => 'cid'])->viaTable('cpfile', ['fid' => 'fid']);
    }
}

<?php

namespace dinhtrung\isms\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "organization".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    public static function getDb(){
    	if (\Yii::$app->has('ismsDb') && \Yii::$app->ismsDb instanceof \yii\db\Connection)
    		return \Yii::$app->ismsDb;
    	else
    		return \Yii::$app->db;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255]
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
        ];
    }

    /**
     * Return the option list suitable for dropDownList
     */
    public static function options($q = NULL){
      return ArrayHelper::map(self::find()->where($q)->all(), 'id', 'title');
    }
}

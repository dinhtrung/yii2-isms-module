<?php

namespace vendor\dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\dinhtrung\isms\models\Datafile;

/**
 * DatafileSearch represents the model behind the search form about `vendor\dinhtrung\isms\models\Datafile`.
 */
class DatafileSearch extends Model
{
    public $fid;
    public $title;
    public $description;
    public $createtime;
    public $filename;
    public $uri;
    public $filemime;
    public $filesize;
    public $status;
    public $updatetime;
    public $uid;

    public function rules()
    {
        return [
            [['fid', 'createtime', 'filesize', 'status', 'updatetime', 'uid'], 'integer'],
            [['title', 'description', 'filename', 'uri', 'filemime'], 'safe'],
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

    public function search($params)
    {
        $query = Datafile::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'fid');
        $this->addCondition($query, 'title', true);
        $this->addCondition($query, 'description', true);
        $this->addCondition($query, 'createtime');
        $this->addCondition($query, 'filename', true);
        $this->addCondition($query, 'uri', true);
        $this->addCondition($query, 'filemime', true);
        $this->addCondition($query, 'filesize');
        $this->addCondition($query, 'status');
        $this->addCondition($query, 'updatetime');
        $this->addCondition($query, 'uid');
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

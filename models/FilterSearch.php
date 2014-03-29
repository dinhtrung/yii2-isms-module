<?php

namespace vendor\dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\dinhtrung\isms\models\Filter;

/**
 * FilterSearch represents the model behind the search form about `vendor\dinhtrung\isms\models\Filter`.
 */
class FilterSearch extends Model
{
    public $id;
    public $title;
    public $reply_refuse;
    public $reply_accept;
    public $reply_false_syntax;
    public $description;
    public $ftpblack;
    public $ftpblackfile;
    public $ftpwhite;
    public $ftpwhitefile;
    public $reply_accept_dup;
    public $reply_refuse_dup;

    public function rules()
    {
        return [
            [['id', 'ftpblack', 'ftpwhite'], 'integer'],
            [['title', 'reply_refuse', 'reply_accept', 'reply_false_syntax', 'description', 'ftpblackfile', 'ftpwhitefile', 'reply_accept_dup', 'reply_refuse_dup'], 'safe'],
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

    public function search($params)
    {
        $query = Filter::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'title', true);
        $this->addCondition($query, 'reply_refuse', true);
        $this->addCondition($query, 'reply_accept', true);
        $this->addCondition($query, 'reply_false_syntax', true);
        $this->addCondition($query, 'description', true);
        $this->addCondition($query, 'ftpblack');
        $this->addCondition($query, 'ftpblackfile', true);
        $this->addCondition($query, 'ftpwhite');
        $this->addCondition($query, 'ftpwhitefile', true);
        $this->addCondition($query, 'reply_accept_dup', true);
        $this->addCondition($query, 'reply_refuse_dup', true);
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

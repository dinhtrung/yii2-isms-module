<?php

namespace dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use dinhtrung\isms\models\Order;

/**
 * OrderSearch represents the model behind the search form about `dinhtrung\isms\models\Order`.
 */
class OrderSearch extends Model
{
    public $id;
    public $title;
    public $description;
    public $userid;
    public $createtime;
    public $updatetime;
    public $status;
    public $expired;
    public $smscount;

    public function rules()
    {
        return [
            [['id', 'userid', 'createtime', 'updatetime', 'status', 'smscount'], 'integer'],
            [['title', 'description', 'expired'], 'safe'],
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
            'userid' => Yii::t('isms', 'Userid'),
            'createtime' => Yii::t('isms', 'Createtime'),
            'updatetime' => Yii::t('isms', 'Updatetime'),
            'status' => Yii::t('isms', 'Status'),
            'expired' => Yii::t('isms', 'Expired'),
            'smscount' => Yii::t('isms', 'Smscount'),
        ];
    }

    public function search($params)
    {
        $query = Order::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'title', true);
        $this->addCondition($query, 'description', true);
        $this->addCondition($query, 'userid');
        $this->addCondition($query, 'createtime');
        $this->addCondition($query, 'updatetime');
        $this->addCondition($query, 'status');
        $this->addCondition($query, 'expired');
        $this->addCondition($query, 'smscount');
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

<?php

namespace dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use dinhtrung\isms\models\Mailbox;

/**
 * MailboxSearch represents the model behind the search form about `dinhtrung\isms\models\Mailbox`.
 */
class MailboxSearch extends Model
{
    public $id;
    public $hostname;
    public $email;
    public $password;
    public $option;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['hostname', 'email', 'password', 'option'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('isms', 'ID'),
            'hostname' => Yii::t('isms', 'Hostname'),
            'email' => Yii::t('isms', 'Email'),
            'password' => Yii::t('isms', 'Password'),
            'option' => Yii::t('isms', 'Option'),
        ];
    }

    public function search($params)
    {
        $query = Mailbox::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'hostname', true);
        $this->addCondition($query, 'email', true);
        $this->addCondition($query, 'password', true);
        $this->addCondition($query, 'option', true);
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

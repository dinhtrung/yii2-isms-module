<?php

namespace dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use dinhtrung\isms\models\Ftpsetting;

/**
 * FtpsettingSearch represents the model behind the search form about `dinhtrung\isms\models\Ftpsetting`.
 */
class FtpsettingSearch extends Model
{
    public $id;
    public $title;
    public $description;
    public $hostname;
    public $username;
    public $password;
    public $path;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'description', 'hostname', 'username', 'password', 'path'], 'safe'],
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
            'hostname' => Yii::t('isms', 'Hostname'),
            'username' => Yii::t('isms', 'Username'),
            'password' => Yii::t('isms', 'Password'),
            'path' => Yii::t('isms', 'Path'),
        ];
    }

    public function search($params)
    {
        $query = Ftpsetting::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'title', true);
        $this->addCondition($query, 'description', true);
        $this->addCondition($query, 'hostname', true);
        $this->addCondition($query, 'username', true);
        $this->addCondition($query, 'password', true);
        $this->addCondition($query, 'path', true);
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

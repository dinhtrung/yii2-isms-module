<?php

namespace vendor\dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\dinhtrung\isms\models\Template;

/**
 * TemplateSearch represents the model behind the search form about `vendor\dinhtrung\isms\models\Template`.
 */
class TemplateSearch extends Model
{
    public $id;
    public $title;
    public $body;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'body'], 'safe'],
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
            'body' => Yii::t('isms', 'Body'),
        ];
    }

    public function search($params)
    {
        $query = Template::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'title', true);
        $this->addCondition($query, 'body', true);
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

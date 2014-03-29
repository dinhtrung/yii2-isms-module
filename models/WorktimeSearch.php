<?php

namespace vendor\dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\dinhtrung\isms\models\Worktime;

/**
 * WorktimeSearch represents the model behind the search form about `vendor\dinhtrung\isms\models\Worktime`.
 */
class WorktimeSearch extends Model
{
    public $id;
    public $start;
    public $end;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['start', 'end'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('isms', 'ID'),
            'start' => Yii::t('isms', 'Start'),
            'end' => Yii::t('isms', 'End'),
        ];
    }

    public function search($params)
    {
        $query = Worktime::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'start');
        $this->addCondition($query, 'end');
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

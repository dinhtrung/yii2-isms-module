<?php

namespace dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use dinhtrung\isms\models\Syntax;

/**
 * SyntaxSearch represents the model behind the search form about `dinhtrung\isms\models\Syntax`.
 */
class SyntaxSearch extends Model
{
    public $fid;
    public $syntax;
    public $type;

    public function rules()
    {
        return [
            [['fid', 'type'], 'integer'],
            [['syntax'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => Yii::t('isms', 'Fid'),
            'syntax' => Yii::t('isms', 'Syntax'),
            'type' => Yii::t('isms', 'Type'),
        ];
    }

    public function search($params)
    {
        $query = Syntax::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'fid');
        $this->addCondition($query, 'syntax', true);
        $this->addCondition($query, 'type');
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

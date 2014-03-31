<?php

namespace vendor\dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\dinhtrung\isms\models\Whitelist;

/**
 * WhitelistSearch represents the model behind the search form about `vendor\dinhtrung\isms\models\Whitelist`.
 */
class WhitelistSearch extends Model
{
    public $fid;
    public $isdn;

    public function rules()
    {
        return [
            [['fid'], 'integer'],
            [['isdn'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fid' => Yii::t('isms', 'Fid'),
            'isdn' => Yii::t('isms', 'Isdn'),
        ];
    }

    public function search($params)
    {
        $query = Whitelist::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'fid');
        $this->addCondition($query, 'isdn', true);
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

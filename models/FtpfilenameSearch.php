<?php

namespace vendor\dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\dinhtrung\isms\models\Ftpfilename;

/**
 * FtpfilenameSearch represents the model behind the search form about `vendor\dinhtrung\isms\models\Ftpfilename`.
 */
class FtpfilenameSearch extends Model
{
    public $cid;
    public $filename;
    public $status;

    public function rules()
    {
        return [
            [['cid', 'status'], 'integer'],
            [['filename'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => Yii::t('isms', 'Cid'),
            'filename' => Yii::t('isms', 'Filename'),
            'status' => Yii::t('isms', 'Status'),
        ];
    }

    public function search($params)
    {
        $query = Ftpfilename::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'cid');
        $this->addCondition($query, 'filename', true);
        $this->addCondition($query, 'status');
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

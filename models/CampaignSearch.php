<?php

namespace vendor\dinhtrung\isms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\dinhtrung\isms\models\Campaign;

/**
 * CampaignSearch represents the model behind the search form about `vendor\dinhtrung\isms\models\Campaign`.
 */
class CampaignSearch extends Model
{
    public $id;
    public $title;
    public $description;
    public $createtime;
    public $updatetime;
    public $codename;
    public $request_date;
    public $request_owner;
    public $datasender;
    public $tosubscriber;
    public $start;
    public $end;
    public $status;
    public $finished;
    public $approved;
    public $active;
    public $sender;
    public $ready;
    public $org;
    public $type;
    public $throughput;
    public $col;
    public $isdncol;
    public $template;
    public $priority;
    public $velocity;
    public $cpworkday;
    public $emailbox;
    public $esubject;
    public $eattachment;
    public $ftpserver;
    public $smsimport;
    public $blockimport;
    public $limit_exceeded;
    public $send;
    public $blocksend;
    public $sent;
    public $blocksent;
    public $orderid;
    public $exported;

    // Additional attributes used for searching
    public $states;						// Search based on `status`,`finished`,`approved`,`active`,`ready`
    public $titleDescTemplate;	// Search based on `title`,`description`,`template`

    public function rules()
    {
        return [
            [['id', 'createtime', 'updatetime', 'status', 'finished', 'approved', 'active', 'ready', 'org', 'type', 'throughput', 'col', 'isdncol', 'priority', 'velocity', 'emailbox', 'ftpserver', 'smsimport', 'blockimport', 'limit_exceeded', 'send', 'blocksend', 'sent', 'blocksent', 'orderid', 'exported'], 'integer'],
            [['title', 'description', 'codename', 'request_date', 'request_owner', 'datasender', 'tosubscriber', 'start', 'end', 'sender', 'template', 'cpworkday', 'esubject', 'eattachment'], 'safe'],
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
            'createtime' => Yii::t('isms', 'Createtime'),
            'updatetime' => Yii::t('isms', 'Updatetime'),
            'codename' => Yii::t('isms', 'Codename'),
            'request_date' => Yii::t('isms', 'Request Date'),
            'request_owner' => Yii::t('isms', 'Request Owner'),
            'datasender' => Yii::t('isms', 'Datasender'),
            'tosubscriber' => Yii::t('isms', 'Tosubscriber'),
            'start' => Yii::t('isms', 'Start'),
            'end' => Yii::t('isms', 'End'),
            'status' => Yii::t('isms', 'Status'),
            'finished' => Yii::t('isms', 'Finished'),
            'approved' => Yii::t('isms', 'Approved'),
            'active' => Yii::t('isms', 'Active'),
            'sender' => Yii::t('isms', 'Sender'),
            'ready' => Yii::t('isms', 'Ready'),
            'org' => Yii::t('isms', 'Org'),
            'type' => Yii::t('isms', 'Type'),
            'throughput' => Yii::t('isms', 'Throughput'),
            'col' => Yii::t('isms', 'Col'),
            'isdncol' => Yii::t('isms', 'Isdncol'),
            'template' => Yii::t('isms', 'Template'),
            'priority' => Yii::t('isms', 'Priority'),
            'velocity' => Yii::t('isms', 'Velocity'),
            'cpworkday' => Yii::t('isms', 'Cpworkday'),
            'emailbox' => Yii::t('isms', 'Emailbox'),
            'esubject' => Yii::t('isms', 'Esubject'),
            'eattachment' => Yii::t('isms', 'Eattachment'),
            'ftpserver' => Yii::t('isms', 'Ftpserver'),
            'smsimport' => Yii::t('isms', 'Smsimport'),
            'blockimport' => Yii::t('isms', 'Blockimport'),
            'limit_exceeded' => Yii::t('isms', 'Limit Exceeded'),
            'send' => Yii::t('isms', 'Send'),
            'blocksend' => Yii::t('isms', 'Blocksend'),
            'sent' => Yii::t('isms', 'Sent'),
            'blocksent' => Yii::t('isms', 'Blocksent'),
            'orderid' => Yii::t('isms', 'Orderid'),
            'exported' => Yii::t('isms', 'Exported'),
        ];
    }

    public function search($params)
    {
        $query = Campaign::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'title', true);
        $this->addCondition($query, 'description', true);
        $this->addCondition($query, 'createtime');
        $this->addCondition($query, 'updatetime');
        $this->addCondition($query, 'codename', true);
        $this->addCondition($query, 'request_date');
        $this->addCondition($query, 'request_owner', true);
        $this->addCondition($query, 'datasender', true);
        $this->addCondition($query, 'tosubscriber', true);
        $this->addCondition($query, 'start');
        $this->addCondition($query, 'end');
        $this->addCondition($query, 'status');
        $this->addCondition($query, 'finished');
        $this->addCondition($query, 'approved');
        $this->addCondition($query, 'active');
        $this->addCondition($query, 'sender', true);
        $this->addCondition($query, 'ready');
        $this->addCondition($query, 'org');
        $this->addCondition($query, 'type');
        $this->addCondition($query, 'throughput');
        $this->addCondition($query, 'col');
        $this->addCondition($query, 'isdncol');
        $this->addCondition($query, 'template', true);
        $this->addCondition($query, 'priority');
        $this->addCondition($query, 'velocity');
        $this->addCondition($query, 'cpworkday', true);
        $this->addCondition($query, 'emailbox');
        $this->addCondition($query, 'esubject', true);
        $this->addCondition($query, 'eattachment', true);
        $this->addCondition($query, 'ftpserver');
        $this->addCondition($query, 'smsimport');
        $this->addCondition($query, 'blockimport');
        $this->addCondition($query, 'limit_exceeded');
        $this->addCondition($query, 'send');
        $this->addCondition($query, 'blocksend');
        $this->addCondition($query, 'sent');
        $this->addCondition($query, 'blocksent');
        $this->addCondition($query, 'orderid');
        $this->addCondition($query, 'exported');
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

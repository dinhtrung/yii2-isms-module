<?php

namespace vendor\dinhtrung\isms\controllers;

use Yii;
use vendor\dinhtrung\isms\models\SendSms;
use vendor\dinhtrung\isms\models\SendSmsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;

/**
 * SendSmsController implements the CRUD actions for SendSms model.
 */
class SendSmsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SendSms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SendSmsSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('indexSendSms', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single SendSms model.
     * @param string $receiver
     * @param integer $campaign_id
     * @return mixed
     */
    public function actionView($receiver, $campaign_id)
    {
        return $this->render('viewSendSms', [
            'model' => $this->findModel($receiver, $campaign_id),
        ]);
    }

    /**
     * Creates a new SendSms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SendSms;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'receiver' => $model->receiver, 'campaign_id' => $model->campaign_id]);
        } else {
            return $this->render('createSendSms', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SendSms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $receiver
     * @param integer $campaign_id
     * @return mixed
     */
    public function actionUpdate($receiver, $campaign_id)
    {
        $model = $this->findModel($receiver, $campaign_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'receiver' => $model->receiver, 'campaign_id' => $model->campaign_id]);
        } else {
            return $this->render('updateSendSms', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SendSms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $receiver
     * @param integer $campaign_id
     * @return mixed
     */
    public function actionDelete($receiver, $campaign_id)
    {
        $this->findModel($receiver, $campaign_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SendSms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $receiver
     * @param integer $campaign_id
     * @return SendSms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($receiver, $campaign_id)
    {
        if (($model = SendSms::find(['receiver' => $receiver, 'campaign_id' => $campaign_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

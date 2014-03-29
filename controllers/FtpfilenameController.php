<?php

namespace vendor\dinhtrung\isms\controllers;

use Yii;
use vendor\dinhtrung\isms\models\Ftpfilename;
use vendor\dinhtrung\isms\models\FtpfilenameSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;

/**
 * FtpfilenameController implements the CRUD actions for Ftpfilename model.
 */
class FtpfilenameController extends Controller
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
     * Lists all Ftpfilename models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FtpfilenameSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('indexFtpfilename', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Ftpfilename model.
     * @param integer $cid
     * @param string $filename
     * @return mixed
     */
    public function actionView($cid, $filename)
    {
        return $this->render('viewFtpfilename', [
            'model' => $this->findModel($cid, $filename),
        ]);
    }

    /**
     * Creates a new Ftpfilename model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ftpfilename;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cid' => $model->cid, 'filename' => $model->filename]);
        } else {
            return $this->render('createFtpfilename', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ftpfilename model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $cid
     * @param string $filename
     * @return mixed
     */
    public function actionUpdate($cid, $filename)
    {
        $model = $this->findModel($cid, $filename);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cid' => $model->cid, 'filename' => $model->filename]);
        } else {
            return $this->render('updateFtpfilename', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ftpfilename model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $cid
     * @param string $filename
     * @return mixed
     */
    public function actionDelete($cid, $filename)
    {
        $this->findModel($cid, $filename)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ftpfilename model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $cid
     * @param string $filename
     * @return Ftpfilename the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cid, $filename)
    {
        if (($model = Ftpfilename::find(['cid' => $cid, 'filename' => $filename])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

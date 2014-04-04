<?php

namespace dinhtrung\isms\controllers;

use Yii;
use dinhtrung\isms\models\Syntax;
use dinhtrung\isms\models\SyntaxSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;

/**
 * SyntaxController implements the CRUD actions for Syntax model.
 */
class SyntaxController extends Controller
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
     * Lists all Syntax models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SyntaxSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('indexSyntax', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Syntax model.
     * @param integer $fid
     * @param string $syntax
     * @return mixed
     */
    public function actionView($fid, $syntax)
    {
        return $this->render('viewSyntax', [
            'model' => $this->findModel($fid, $syntax),
        ]);
    }

    /**
     * Creates a new Syntax model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Syntax;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'fid' => $model->fid, 'syntax' => $model->syntax]);
        } else {
            return $this->render('createSyntax', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Syntax model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $fid
     * @param string $syntax
     * @return mixed
     */
    public function actionUpdate($fid, $syntax)
    {
        $model = $this->findModel($fid, $syntax);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'fid' => $model->fid, 'syntax' => $model->syntax]);
        } else {
            return $this->render('updateSyntax', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Syntax model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $fid
     * @param string $syntax
     * @return mixed
     */
    public function actionDelete($fid, $syntax)
    {
        $this->findModel($fid, $syntax)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Syntax model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $fid
     * @param string $syntax
     * @return Syntax the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($fid, $syntax)
    {
        if (($model = Syntax::find(['fid' => $fid, 'syntax' => $syntax])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

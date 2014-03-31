<?php

namespace vendor\dinhtrung\isms\controllers;

use Yii;
use vendor\dinhtrung\isms\models\Filter;
use vendor\dinhtrung\isms\models\FilterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use vendor\dinhtrung\isms\models\Syntax;
use vendor\dinhtrung\isms\models\Cpfilter;
use vendor\dinhtrung\isms\models\BlacklistSearch;
use vendor\dinhtrung\isms\models\WhitelistSearch;

/**
 * FilterController implements the CRUD actions for Filter model.
 */
class FilterController extends Controller
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
     * Lists all Filter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilterSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('indexFilter', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Filter model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$model = $this->findModel($id);
    	$searchModel = [
    		'blacklist' => new BlacklistSearch(),
    		'whitelist' => new WhitelistSearch(),
    	];
    	$dataProvider = [
    		'blacklist' => $searchModel['blacklist']->search(array_merge_recursive(Yii::$app->request->getQueryParams(), ['fid' => $model->id])),
    		'whitelist' => $searchModel['whitelist']->search(array_merge_recursive(Yii::$app->request->getQueryParams(), ['fid' => $model->id])),
    	];

        return $this->render('viewFilter', [
            'model' => $model,
        	'searchModel' => $searchModel,
        	'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Filter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Filter;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	// Post-processing syntaxes
        	foreach (explode("\n", $model->accept_syntax) as $item){
        		$syntax = new Syntax();
        		$syntax->fid = $model->id;
        		$syntax->syntax = trim($item);
        		$syntax->type = Syntax::TYPE_WHITELIST;
        		$syntax->save();
        	}
        	foreach (explode("\n", $model->refuse_syntax) as $item){
        		$syntax = new Syntax();
        		$syntax->fid = $model->id;
        		$syntax->syntax = trim($item);
        		$syntax->type = Syntax::TYPE_BLACKLIST;
        		$syntax->save();

        	}
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('createFilter', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Filter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $refuse_syntax = $accept_syntax = [];
        foreach ($model->getSyntax()->all() as $s){
        	if ($s->type == Syntax::TYPE_WHITELIST) $accept_syntax[] = $s->syntax;
        	elseif ($s->type == Syntax::TYPE_BLACKLIST) $refuse_syntax[] = $s->syntax;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	// Accept Syntax
        	$newSyntax = [];
        	foreach (explode("\n", $model->accept_syntax) as $item){
        		$newSyntax[] = trim($item);
        	}
        	$remove = array_diff($accept_syntax, $newSyntax);
        	$add = array_diff($newSyntax, $accept_syntax);
        	if (count($remove)) Syntax::deleteAll(['and', ['fid' => $model->id], ['in', 'syntax', $remove]]);
        	foreach ($add as $s){
        		$syntax = new Syntax();
        		$syntax->fid = $model->id;
        		$syntax->syntax = trim($item);
        		$syntax->type = Syntax::TYPE_WHITELIST;
        		if (! $syntax->save()) Yii::trace(json_encode($syntax->errors));
        	}
        	// Refuse Syntax
        	$newSyntax = [];
        	foreach (explode("\n", $model->refuse_syntax) as $item){
        		$newSyntax[] = trim($item);
        	}
        	$remove = array_diff($refuse_syntax, $newSyntax);
        	$add = array_diff($newSyntax, $refuse_syntax);
        	if (count($remove)) Syntax::deleteAll(['and', ['fid' => $model->id], ['in', 'syntax', $remove]]);
        	Syntax::deleteAll(['in', 'syntax', $remove]);
        	foreach ($add as $s){
        		$syntax = new Syntax();
        		$syntax->fid = $model->id;
        		$syntax->syntax = trim($item);
        		$syntax->type = Syntax::TYPE_BLACKLIST;
        		if (! $syntax->save()) Yii::trace(json_encode($syntax->errors));
        	}
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
        	$model->accept_syntax = implode("\n", $accept_syntax);
        	$model->refuse_syntax = implode("\n", $refuse_syntax);
            return $this->render('updateFilter', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Filter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        // Delete all related syntax
        Syntax::deleteAll(['fid' => $model->id]);
        Cpfilter::deleteAll(['fid' => $model->id]);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Filter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Filter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if ($id !== null && ($model = Filter::find($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

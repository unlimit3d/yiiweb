<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Job;
use frontend\models\JobSearch;
//use yii\web\Controller; /// ตัวเก่า ใช้ Appcontroller แทน
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\AppController;
use frontend\models\CStatus;

/**
 * JobController implements the CRUD actions for Job model.
 */
class JobController extends AppController // เปลี่ยนนจาก Controller เป็น AppControler สิทธิ์
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Job models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $this->permitRole([1,99]);
        $searchModel = new JobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Job model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Job model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Job();

        $model->date_add = date('Y-m-d');
        // $model->date_recept = date('Y-m-d');
        // $model->date_end = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $msg = "--รายการแจ้งซ่อมใหม่ [ผู้แจ้ง: ".$model->customer."]";
            $this->sendLineNotify($msg);
            
            return $this->redirect(["view", 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Job model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->permitRole([1]);
         
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            if($model->job_status == '2'){
                $this->sendLineNotify("--อัพเดตสถานะ  [ผู้แจ้ง: ".$model->customer."] \r\n สถานะ: ". CStatus::findOne($model->job_status)->name);
//            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Job model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->permitRole([1]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Job model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Job::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Messaging;
use app\models\search\MessagingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessagingController implements the CRUD actions for Messaging model.
 */
class MessagingController extends Controller
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
     * Lists all Messaging models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessagingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	
	$this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ <a href="/index.php?r=admin">Администрирование</a> \ Рассылки';

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Messaging model.
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
     * Creates a new Messaging model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Messaging();

        if ($model->load(Yii::$app->request->post())) {
	    $model->created = time();
	    $model->sent = 1;
	    $model->emails = json_encode($model->emails);
	    $model->status = Messaging::STATUS_NEW;
	    $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Messaging model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Messaging model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Messaging model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Messaging the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Messaging::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /**
     * Sends an existing Messaging model.
     * If sending is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSend($id)
    {
        $messaging = Messaging::find()->where(['id' => $id, 'status' => Messaging::STATUS_NEW])->one();
	if ($messaging) {
	  $emails = json_decode($messaging->emails, true);
	  if (is_array($emails)) {
	    foreach ($emails as $email) {
	      Yii::$app->mailer->compose()
		  ->setTo($email)
		  ->setSubject($messaging->subject)
		  ->setFrom(Yii::$app->params['adminEmail'])
		  ->setTextBody($messaging->content)
		  ->send();
	    }
	    $messaging->status = Messaging::STATUS_SENT;
	    $messaging->save();
	  }
	}

        return $this->redirect(['index']);
    }
}

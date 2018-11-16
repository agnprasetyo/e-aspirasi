<?php

namespace backend\controllers;

use Yii;
use common\models\TransaksiInfrastruktur;
use backend\models\TransaksiInfrastrukturSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiInfrastrukturController implements the CRUD actions for TransaksiInfrastruktur model.
 */
class TransaksiInfrastrukturController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulkdelete' => ['post'],
                    'approve' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TransaksiInfrastruktur models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiInfrastrukturSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        if ($model->approve == $model::STATUS_NOT_APPROVED) {
          $model->approve = $model::STATUS_APPROVED;
        } else {
          $model->approve = $model::STATUS_NOT_APPROVED;
        }

        if ($model->save()) {
          Yii::$app->session->setFlash('success', 'Data berhasil diapprove.');
        } else {
          Yii::$app->session->setFlash('error', 'Data gagal diapprove.');
        }

        return $this->redirect(['index']);
      }

    /**
     * Displays a single TransaksiInfrastruktur model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = TransaksiInfrastruktur::find()
               ->joinWith(['user', 'jenis', 'wilayah', 'status'])
               ->where(['transaksi_infrastruktur.id' => $id])
               ->one();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TransaksiInfrastruktur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransaksiInfrastruktur();

        if ($model->load(Yii::$app->request->post())) {
          $model->id_user = Yii::$app->user->id;
          $model->tanggal = date('Y-m-d');
          if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
          }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TransaksiInfrastruktur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TransaksiInfrastruktur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TransaksiInfrastruktur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TransaksiInfrastruktur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransaksiInfrastruktur::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\controllers;

use Yii;
use common\models\TransaksiPelayanan;
use backend\models\TransaksiPelayananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiPelayananController implements the CRUD actions for TransaksiPelayanan model.
 */
class TransaksiPelayananController extends Controller
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
     * Lists all TransaksiPelayanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiPelayananSearch();
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
     * Displays a single TransaksiPelayanan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        $model = TransaksiPelayanan::find()
               ->joinWith(['user', 'jenis', 'wilayah', 'review', 'tempat'])
               ->where(['transaksi_pelayanan.id' => $id])
               ->one();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TransaksiPelayanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransaksiPelayanan();

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
     * Updates an existing TransaksiPelayanan model.
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
     * Deletes an existing TransaksiPelayanan model.
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
     * Finds the TransaksiPelayanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TransaksiPelayanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransaksiPelayanan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

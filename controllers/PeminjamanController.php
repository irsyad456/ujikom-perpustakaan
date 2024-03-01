<?php

namespace app\controllers;

use app\config\functions;
use app\models\Buku;
use app\models\Peminjaman;
use app\models\PeminjamanSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeminjamanController implements the CRUD actions for Peminjaman model.
 */
class PeminjamanController extends \app\controllers\BaseControllers
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Peminjaman models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peminjaman model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Peminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $peminjaman = Peminjaman::find('id')
            ->where(['user_id' => Yii::$app->user->id, 'buku_id' => $id])
            ->andWhere(['in', 'status_peminjaman', ['Dipinjam', 'Diperpanjang']])->one();

        if ($peminjaman) {
            Yii::$app->session->setFlash('warning', 'You Already Borrowed This Book');
            return $this->redirect(urldecode(Yii::$app->request->referrer));
        }

        $model = new Peminjaman();
        $book = Buku::find()->where(['id' => $id])->one();

        if ($model->load($this->request->post())) {
            $model->buku_id = $id;
            $model->user_id = Yii::$app->user->id;
            $model->status_peminjaman = 'Dipinjam';
            $model->save();
            Yii::$app->session->setFlash('success', 'Book Borrowed Successfully');
            return $this->redirect(['borrowed-book']);
        }

        return $this->render('create', [
            'model' => $model,
            'book' => $book
        ]);
    }

    /**
     * Updates an existing Peminjaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($this->request->post())) {
            if ($model->isAttributeChanged('tanggal_pengembalian')) {
                $model->status_peminjaman = 'Diperpanjang';
            }
            if ($model->status_peminjaman == 'Dikembalikan' && date('Y-m-d') > $model->tanggal_pengembalian) {
                $model->status_peminjaman = 'Terlambat';
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Peminjaman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBorrowedBook()
    {
        $model = Peminjaman::find()->where(['user_id' => Yii::$app->user->id])->all();

        return $this->render('borrowed_book', [
            'model' => $model
        ]);
    }

    /**
     * Finds the Peminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Peminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peminjaman::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

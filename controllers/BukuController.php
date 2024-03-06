<?php

namespace app\controllers;

use app\config\functions;
use app\models\Buku;
use app\models\BukuSearch;
use app\models\KategoriBukuRelasi;
use app\models\UlasanBuku;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BukuController implements the CRUD actions for Buku model.
 */
class BukuController extends \app\controllers\BaseControllers
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Buku models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BukuSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buku model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Buku::find()->where(['id' => $id])->one();
        return $this->render('view', [
            'model' => $model,
            'data' => $model->kategoriBukuRelasis->kategoribuku->namaKategori
        ]);
    }

    /**
     * Creates a new Buku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Buku();
        $relasi = new KategoriBukuRelasi();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $relasi->load($this->request->post()) && $model->save()) {
                $model->refresh();
                $relasi->buku_id = $model->id;
                $relasi->save();
                Yii::$app->session->setFlash('success', 'Book Added');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'relasi' => $relasi
        ]);
    }

    /**
     * Updates an existing Buku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $relasi = KategoriBukuRelasi::findOne(['buku_id' => $id]);

        if ($this->request->isPost && $model->load($this->request->post()) && $relasi->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $model->save(false); // Save without validation
                $relasi->save(false); // Save without validation

                // transaction is for if there's some error on save it will roll back last saved 
                $transaction->commit();

                Yii::$app->session->setFlash('success', 'Book Updated');
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Failed to update book: ' . $e->getMessage());
            }
        }

        return $this->render('update', [
            'model' => $model,
            'relasi' => $relasi
        ]);
    }

    /**
     * Deletes an existing Buku model.
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

    public function actionBookList()
    {
        $query = Buku::find();
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count()
        ]);

        $book_limit = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('book-list', [
            'books' => $query->all(),
            'book_limit' => $book_limit,
            'pagination' => $pagination
        ]);
    }

    public function actionBookDetails($id)
    {
        // functions::DumpAndDie(UlasanBuku::find()->select('id')->count());
        $rating = new UlasanBuku();
        if ($rating->load(Yii::$app->request->post())) {
            $rating->buku_id = $id;
            $rating->user_id = Yii::$app->user->identity->id;
            $rating->created_at = date('Y-m-d');
            if ($rating->save()) {
                // Redirect the user back to the same page after saving the rating
                Yii::$app->session->setFlash('success', 'Rating Added Successfully');
                return $this->redirect(['book-details', 'id' => $id]);
            } else {
                // Handle the case when saving fails
                Yii::$app->session->setFlash('error', 'Error saving rating.');
            }
        }

        $query = UlasanBuku::find()->where(['buku_id' => $id])->orderBy('created_at DESC');
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count()
        ]);
        $book_rating = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        // functions::DumpAndDie($book_rating);

        $rating->ulasan = null;
        $rating->rating = null;
        return $this->render('book-details', [
            'book' => $this->findModel($id),
            'book_rating' => $book_rating,
            'rating' => $rating,
            'pagination' => $pagination
        ]);
    }

    /**
     * Finds the Buku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Buku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buku::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

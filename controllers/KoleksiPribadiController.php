<?php

namespace app\controllers;

use app\models\KoleksiPribadi;
use app\models\KoleksiPribadiSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KoleksiPribadiController implements the CRUD actions for KoleksiPribadi model.
 */
class KoleksiPribadiController extends \app\controllers\BaseControllers
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
     * Lists all KoleksiPribadi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = KoleksiPribadi::find()->where(['user_id' => Yii::$app->user->id])->all();
        $searchModel = new KoleksiPribadiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KoleksiPribadi model.
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
     * Creates a new KoleksiPribadi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $koleksi = KoleksiPribadi::find()
            ->where(['user_id' => Yii::$app->user->id, 'buku_id' => $id]);

        if ($koleksi) {
            Yii::$app->session->setFlash('warning', 'You Already Add This Book To Collection');
            return $this->redirect(urldecode(Yii::$app->request->referrer));
        }

        try {
            $model = new KoleksiPribadi();

            $model->buku_id = $id;
            $model->user_id = Yii::$app->user->id;
            $model->save();

            Yii::$app->session->setFlash('success', 'Added To Collections Successfully');
            return $this->redirect(urldecode(Yii::$app->request->referrer));
        } catch (\Exception $error) {
            Yii::error('Somehthing Happened: ' . $error->getMessage());
        }
    }

    /**
     * Updates an existing KoleksiPribadi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing KoleksiPribadi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $this->findModel($this->request->post('id'))->delete();

        Yii::$app->session->setFlash('success', 'Book Removed From Collections');
        return $this->redirect(['index']);
    }

    /**
     * Finds the KoleksiPribadi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return KoleksiPribadi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KoleksiPribadi::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

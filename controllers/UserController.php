<?php

namespace app\controllers;

use app\config\functions;
use app\models\PetugasSearch;
use app\models\User;
use app\models\UserSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends \app\controllers\BaseControllers
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
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $role =  Yii::$app->getDb()->createCommand(
            "SELECT item_name FROM auth_assignment
                WHERE user_id=:user_id",
            [':user_id' => $id]
        )->queryAll();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'role' => $role
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();
        $role = null;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
                $model->created_at = date('Y-m-d');
                $model->updated_at = date('Y-m-d');

                if ($model->validate()) {
                    $model->save();
                    $model->refresh();

                    $db = Yii::$app->getDb();

                    $sql = "INSERT INTO auth_assignment (item_name, user_id, created_at)
                            VALUES (:item_name, :user_id, :created_at)";

                    $params = [
                        ':item_name' => $this->request->post('role'),
                        ':user_id' => $model->id,
                        ':created_at' => date(('Y-m-d'))
                    ];

                    $db->createCommand($sql, $params)->execute();

                    Yii::$app->session->setFlash('success', 'User Created');
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    $model->loadDefaultValues();
                    $model->password_hash = '';
                }
            }
        } else {
            $model->loadDefaultValues();
            $model->password_hash = '';
        }

        return $this->render('create', [
            'model' => $model,
            'role' => $role
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->password_hash = null;

        $db = Yii::$app->getDb();

        $role = $db->createCommand(
            "SELECT item_name FROM auth_assignment
                WHERE user_id=:user_id",
            [':user_id' => $id]
        )->queryAll();

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->updated_at = date('Y-m-d');
            $model->save();

            $db->createCommand(
                "UPDATE auth_assignment
                SET item_name=:item_name WHERE user_id=:user_id",
                [':user_id' => $id, ':item_name' => $this->request->post('role')]
            )->execute();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'role' => $role
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->getDb()->createCommand(
            "DELETE FROM auth_assignment 
            WHERE user_id=:user_id",
            [':user_id' => $id]
        )->execute();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPetugasIndex()
    {
        $searchModel = new PetugasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        // functions::DumpAndDie($dataProvider);

        return $this->render('petugas-index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

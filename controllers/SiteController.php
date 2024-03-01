<?php

namespace app\controllers;

use app\config\functions;
use app\models\Buku;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Peminjaman;
use app\models\SignupForm;
use app\models\User;

class SiteController extends \app\controllers\BaseControllers
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'logout' => ['post'],
                    ],
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $books = '';
        $borrow = '';
        $users = '';
        $mostBorrow = '';
        if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('Petugas')) {
            $books = Buku::find('id')->count();
            $borrow = Peminjaman::find('id')->count();
            $users = User::find('id')->count();
            // ngambil id buku yang paling banyak dipinjam
            $mostBorrowedBookId = Peminjaman::find()
                ->select(['buku_id', 'GROUP_CONCAT(id ORDER BY id DESC) as borrowIds'])
                ->groupBy(['buku_id'])
                ->orderBy(['COUNT(*)' => SORT_DESC])
                ->limit(1)
                ->scalar();

            if ($mostBorrowedBookId !== null) {
                // Find the book title of the most borrowed book
                $mostBorrowedBook = Peminjaman::findOne($mostBorrowedBookId);
                $mostBorrow = $mostBorrowedBook ? $mostBorrowedBook->buku->judul : 'None';
            } else {
                $mostBorrow = 'None';
            }
        }

        return $this->render('index', [
            'books' => $books,
            'borrow' => $borrow,
            'users' => $users,
            'mostBorrow' => $mostBorrow,
        ]);
    }

    /**
     * Register Action
     */
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = "auth";

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Register Successful');
            return $this->redirect(['site/login']);
        }

        $model->password = '';
        return $this->render('auth/register', [
            'model' => $model
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = "auth";

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('auth/login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}

<?php

namespace app\controllers;

use app\models\Biodata;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use kartik\mpdf\Pdf;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'pdf'],
                'rules' => [
                    [
                        'actions' => ['logout', 'pdf'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
        if (!Yii::$app->user->isGuest) {

            $user = Yii::$app->user->identity->username;
            $level = Yii::$app->user->identity->level;
            if ($level == 1) {
                $bio = Biodata::find();
            } else {
                $bio = Biodata::find()->where(['username' => $user]);
            }
            $request = Yii::$app->request;

            $search = $request->get('search');
            $param = [];
            if (!empty($search)) {
                $param =
                    [
                        'OR',
                        ['like', 'nama', $search],
                        ['like', 'alamat', $search],
                        ['like', 'jkelamin', strtoupper(substr($search, 0, 1))],
                        ['like', 'pekerjaan', $search],
                    ];
                $bio = $bio->andFilterWhere($param);
            }
            $bio = $bio->all();
            return $this->render('index', [
                "model" => $bio,
                "user" => $user,
                "level" => $level,
                "search" => $search,
            ]);
        }
        return $this->redirect(['site/login']);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
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

        return $this->goHome();
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

    public function actionPdf($search)
    {

        $content = $this->renderPartial('print');

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'options' => ['title' => 'Laporan Harian']

        ]);
        return $pdf->render();
    }
}

<?php

namespace app\controllers;

use app\models\Appointment;
use app\models\Basket;
use app\models\Orders;
use app\models\Product;
use app\models\RegisterForm;
use app\models\Reservations;
use app\models\Tables;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','logout', 'dashboard'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'dashboard'],
                        'roles' => ['@']
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
        return $this->render('index');
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

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionRegister(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            if ($user = $model->register()) {
                $auth = Yii::$app->authManager;
                $userRole = $auth->getRole('user');
                $auth->assign($userRole, $user->id);

                Yii::$app->user->login($user);
                return $this->goHome();
            }
        }

        $context = [
            'model' => $model
        ];

        return $this->render('register', $context);
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
        $model = new Appointment();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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


    public function actionTable()
    {
        $model = new Reservations();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        }

        return $this->render('table', ['model'=>$model]);
    }

    public function actionBasket()
    {
        $user_id = Yii::$app->user->id;
        $basket = Basket::find()->where(['user_id' => $user_id])->all();

        return $this->render('/site/basket', [
            'basket' => $basket
        ]);
    }


    public function actionMenu()
    {
        $model = Product::find()
            ->joinWith('category') // имя связи
            ->orderBy(['categories.sort_order' => SORT_ASC])
            ->all();
        return$this->render('menu', ['model'=>$model]);
    }
    public function actionAdd
    (){
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        $user_id = Yii::$app->user->id;
        $basket_id = Basket::find()->where(['product_id' => $id, 'user_id' => $user_id])->one();
        if ($product->counts != 0){
            if ($basket_id) {
                $basket_id->product_id = $product->id;
                $basket_id->price = $product->price;
                $basket_id->user_id = Yii::$app->user->id;
                $basket_id->counts = $basket_id->counts + 1;
                $product->counts -= 1;
                $product->save();
                $basket_id->save();
                Yii::$app->session->setFlash('success', 'Товар добавлен в корзину!');
            }else{
                $basket = new Basket();
                $basket->price = $product->price;
                $basket->product_id = $product->id;
                $basket->user_id = Yii::$app->user->id;
                $basket->counts = 1;
                $product->counts -= 1;
                $product->save();
                $basket->save();
                Yii::$app->session->setFlash('success', 'Товар добавлен в корзину!');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Товар нет в наличии!');
        }
        return $this->goHome();

    }

    public function actionDelivery()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Ваш заказ успешно отправлен!');
            return $this->refresh();
        }

        return $this->render('delivery', ['model' => $model]);
    }

    public function actionAddition()
    {
        $id = Yii::$app->request->get('id');

        $basket = Basket::findOne($id);

        if ($basket->product->counts != 0) {
            $basket->counts += 1;

            $basket->product->counts -= 1;

            $basket->save();
            $basket->product->save();
            Yii::$app->session->setFlash('success', 'Товар добавлен в корзину!');
        } else {
            Yii::$app->session->setFlash('error', 'Товара нет в наличии');
        }
        return $this->redirect('basket');
    }

    public function actionRemove() {
        $id = Yii::$app->request->get('id');

        $basket = Basket::findOne($id);

        if ($basket->counts == 1) {
            $basket->delete();
        } else {
            $basket->counts -= 1;
            $basket->save();

            $basket->product->counts += 1;
            $basket->product->save();
        }
        Yii::$app->session->setFlash('success', 'Товар удален из корзины!');
        return $this->redirect('basket');
    }
}



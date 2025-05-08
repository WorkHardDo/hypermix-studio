<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use frontend\models\SignupForm;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\Orders; // или путь к модели

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

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



public function actionMix()
{
    return $this->render('mix');
}

public function actionMastering()
{
    return $this->render('mastering');
}

public function actionVerifyEmail($token)
{
    try {
        $user = \common\models\User::findByVerificationToken($token);

        if (!$user) {
            throw new \yii\web\BadRequestHttpException('Неверный токен подтверждения.');
        }

        if ($user->confirmEmail()) {
            Yii::$app->session->setFlash('success', 'Email успешно подтверждён!');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при подтверждении email.');
        }

    } catch (\Throwable $e) {
        Yii::$app->session->setFlash('error', 'Недопустимый токен.');
    }

    return $this->redirect(['/']);
}


public function actionError()
{
    $this->layout = false;
    return $this->render('error');
}

public function actionAuth()
{
    $login = new \frontend\models\LoginForm();
    $signup = new \frontend\models\SignupForm();
    return $this->render('auth', compact('login', 'signup'));
}

public function actionCabinet()
{
    $orders = \frontend\models\Order::find()
        ->where(['id_user' => Yii::$app->user->id])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();

    return $this->render('cabinet', [
        'orders' => $orders,
    ]);
}




public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'only' => ['cabinet'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'], // только для авторизованных
                ],
            ],
        ],
    ];
}

    public function actionSignup()
{
    $model = new SignupForm();
    if ($model->load(Yii::$app->request->post()) && $model->signup()) {
        return $this->goHome();
    }

    return $this->render('signup', ['model' => $model]);
}

   public function actionLogout()
{
    Yii::$app->user->logout();
    return $this->goHome(); // или return $this->redirect('/');
}

}

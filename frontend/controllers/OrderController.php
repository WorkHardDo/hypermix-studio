<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\models\Order; // добавляем сюда модель заказа

class OrderController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // только для авторизованных
                    ],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/auth']);
        }

        $post = Yii::$app->request->post();

        $order = new Order();
        $order->id_user = Yii::$app->user->id;
        $order->service_type = $post['service_type'] ?? '';
        $order->social = $post['social'] ?? null;
        $order->singers = $post['singers'] ?? 1;
        $order->same_track = $post['same_track'] ?? null;
        $order->source = $post['source'] ?? '';
        $order->tonal = $post['tonal'] ?? null;
        $order->description = $post['description'] ?? null;
        $order->status = 'не оплачен';
        $order->price = null;
        $order->created_at = time();
        $order->updated_at = time();
        $order->project_name = $post['project_name'] ?? null;


        if ($order->save()) {
            Yii::$app->session->setFlash('success', 'Ваш заказ успешно создан!');
            return $this->goHome();
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при создании заказа.');
            return $this->goBack();
        }
    }


public function actionCancel()
{
    if (Yii::$app->request->isPost) {
        $orderId = Yii::$app->request->post('order_id');
        $order = \frontend\models\Order::findOne([
            'id_order' => $orderId,
            'id_user' => Yii::$app->user->id,
            'status' => 'не оплачен',
        ]);

        if ($order) {
            $order->delete();
            Yii::$app->session->setFlash('success', 'Заказ успешно отменён.');
        } else {
            Yii::$app->session->setFlash('error', 'Невозможно отменить заказ.');
        }
    }
    return $this->redirect(['/cabinet']);
}


public function actionPay()
{
    if (Yii::$app->request->isPost) {
        $orderId = Yii::$app->request->post('order_id');
        $order = \frontend\models\Order::findOne([
            'id_order' => $orderId,
            'id_user' => Yii::$app->user->id,
            'status' => 'не оплачен',
        ]);

        if ($order) {
            // ИМИТАЦИЯ ОПЛАТЫ:
            $order->status = 'в работе';
            $order->updated_at = time();
            if ($order->save()) {
                Yii::$app->session->setFlash('success', 'Оплата прошла успешно! Ваш заказ теперь в работе.');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при обновлении заказа.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Невозможно оплатить этот заказ.');
        }
    }
    return $this->redirect(['/cabinet']);
}



}

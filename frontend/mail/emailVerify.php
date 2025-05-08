<?php

use yii\helpers\Html;

/* @var $user \common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['/site/verify-email', 'token' => $user->email_verification_token]);
?>

<h3>Здравствуйте, <?= Html::encode($user->username) ?>!</h3>

<p>Пожалуйста, подтвердите свою почту по ссылке:</p>

<p><?= Html::a('Подтвердить Email', $verifyLink) ?></p>

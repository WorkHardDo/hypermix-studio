<?php

/** @var \yii\web\View $this */
/** @var \common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>

<h1>Подтверждение Email</h1>

<p>Здравствуйте, <?= \yii\helpers\Html::encode($user->username) ?>,</p>

<p>Перейдите по ссылке ниже, чтобы подтвердить свою электронную почту:</p>

<p><?= \yii\helpers\Html::a('Подтвердить Email', $verifyLink) ?></p>

<p>Если вы не регистрировались на нашем сайте, просто проигнорируйте это письмо.</p>

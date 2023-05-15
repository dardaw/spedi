<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $exception->getLine() . ' ' . $exception->getTrace();
?>
<div class="site-error">
    <?php $teraz = new DateTime("NOW"); ?>
    <h1><?= Html::encode($trace[0]['args'][0]->id) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($exception->getMessage())) ?>
    </div>
    <p>
        Wystąpił błąd w programie.
    </p>
    <p>
        Jeżeli problem się powtórzy prosimy o kontakt.
    </p>
    <p>
        Dokładna data błędu. <?php echo $teraz->format("Y-m-d H:i:s"); ?>
    </p>

</div>

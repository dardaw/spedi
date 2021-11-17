<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link href="<?php echo Url::base() ?>/css/site.css?md=<?php echo rand(1, 100); ?>" rel="stylesheet">
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <?php $url = Url::toRoute(['zlecenia/index']); ?>
                            <a class="navbar-brand" href="<?php echo $url; ?>">Spedi</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <?php $url = Url::toRoute(['zlecenia/index']); ?>
                                <li><a href="<?php echo $url; ?>">Zlecenia</a></li>
                                  <?php $url = Url::toRoute(['faktury/index']); ?>
                                <li><a href="<?php echo $url; ?>">Faktury</a></li>
                                <?php $url = Url::toRoute(['kontrahenci/index']); ?>
                                <li><a href="<?php echo $url; ?>">Kontrahenci</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" id="filtr_przycisk">Filtr</a></li>
                                  <?php $url = Url::toRoute(['logowanie/wyloguj']); ?>
                                <li><a href="<?php echo $url; ?>">Wyloguj</a></li>
                            </ul>
                        </div>
                    </div><!--/.container-fluid -->
                </nav>
                <?= $content ?>
            </div>
        </div>

        <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/layouts/filtr.php'); ?>

        <input type="hidden" id="base_url" value="<?php echo Url::base(); ?>" />
        <input type="hidden" id="controller_name" value="<?php echo Yii::$app->controller->id; ?>" />
        <input type="hidden" id="action_name" value="<?php echo Yii::$app->controller->action->id; ?>" />

        <?php $this->endBody() ?>
        <script src="<?php echo Url::base() ?>/js/system.js?md=<?php echo rand(1, 100); ?>"></script>
    </body>
</html>
<?php $this->endPage() ?>

<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Rachunki bankowe';
?>
<div class="site-index">



    <div class="body-content">
        <?php if (!empty($get['id'])): ?>
            <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/layouts/kontrahentmenu.php', ['kh_id' => $get['id']]); ?>
        <?php endif; ?>

        <?php $dodaj = Url::toRoute(['rachunki/dodaj', 'id' => $get['id']]); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj rachunek bankowy</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Numer rachunku
                    </td>
                    <td scope="col"> 
                        Waluta
                    </td>
                </tr>
                <?php foreach ($rachunki as $rachunek): ?>      
                    <?php $url = Url::toRoute(['rachunki/edycja', 'rach_id' => $rachunek['rach_id'], 'id' => $rachunek['kh_id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php echo $rachunek['rach_numer_rachunku']; ?>
                        </td>
                        <td>
                            <?php echo $rachunek['rach_waluta']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>


    </div>
</div>

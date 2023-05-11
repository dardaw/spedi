<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Telefony kontaktowe';
?>
<div class="site-index">



    <div class="body-content">
        <?php if (!empty($get['id'])): ?>
            <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/layouts/kontrahentmenu.php', ['kh_id' => $get['id']]); ?>
        <?php endif; ?>

        <?php $dodaj = Url::toRoute(['telefony/dodaj', 'kh_id' => $get['id']]); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj kontakt</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Typ
                    </td>
                    <td scope="col">
                        Imię Nazwisko
                    </td>
                    <td scope="col">
                        Numer telefonu
                    </td>
                    <td scope="col">
                        Dział
                    </td>
                </tr>
                <?php foreach ($telefony as $telefon): ?>      
                    <?php $url = Url::toRoute(['telefony/edycja', 'id' => $telefon['telefon_id'], 'kh_id' => $get['id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                          <td scope="row">
                            <?php echo $telefon['telefon_typ']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $telefon['telefon_do_kogo']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $telefon['telefon_numer']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $telefon['telefon_dzial']; ?>
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

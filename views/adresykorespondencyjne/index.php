<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Adresy korespondencyjne';
?>
<div class="site-index">



    <div class="body-content">
        <?php if (!empty($get['id'])): ?>
            <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/layouts/kontrahentmenu.php', ['kh_id' => $get['id']]); ?>
        <?php endif; ?>

        <?php $dodaj = Url::toRoute(['adresykorespondencyjne/dodaj', 'kh_id' => $get['id']]); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj miejsce</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Nazwa
                    </td>
                    <td scope="col">
                        Kod pocztowy
                    </td>
                    <td scope="col">
                        Miasto
                    </td>
                    <td scope="col">
                        Ulica
                    </td>
                    <td scope="col">
                        Kraj
                    </td>
                </tr>
                <?php foreach ($adresy as $adres): ?>      
                    <?php $url = Url::toRoute(['adresykorespondencyjne/edycja', 'id' => $adres['adres_kor_id'], 'kh_id' => $get['id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                          <td scope="row">
                            <?php echo $adres['adres_kor_nazwa']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_kor_kod_pocztowy']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_kor_miasto']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_kor_ulica']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_kor_kraj']; ?>
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

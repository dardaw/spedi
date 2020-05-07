<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Adresy';
?>
<div class="site-index">



    <div class="body-content">
        <?php if (!empty($get['id'])): ?>
            <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/layouts/zleceniemenu.php', ['zl_id' => $get['id']]); ?>
        <?php endif; ?>

        <?php $dodaj = Url::toRoute(['adresy/dodaj', 'zl_id' => $get['id']]); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj miejsce</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Pozycja
                    </td>
                    <td scope="col">
                        Typ
                    </td>
                    <td scope="col">
                        Nazwa/Firma
                    </td>
                    <td scope="col">
                        Ulica
                    </td>
                    <td scope="col">
                        Miasto
                    </td>
                    <td scope="col">
                        Kraj
                    </td>
                    <td scope="col">
                        Ładunek
                    </td>
                    <td scope="col">
                        Waga
                    </td>
                    <td scope="col">
                        Data
                    </td>
                </tr>
                <?php $ktory = 0; ?>
                <?php foreach ($adresy as $adres): ?>      
                    <?php $url = Url::toRoute(['adresy/edycja', 'id' => $adres['adres_id'], 'zl_id' => $get['id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php echo ++$ktory; ?>
                        </td>
                          <td scope="row">
                            <?php echo $adres['adres_typ']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_nazwa']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_ulica']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_miasto']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_kraj']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_ladunek']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_waga']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $adres['adres_data']; ?>
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

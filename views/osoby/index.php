<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Pracownicy';
?>
<div class="site-index">



    <div class="body-content">
        <?php if (!empty($get['id'])): ?>
            <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/layouts/kontrahentmenu.php', ['kh_id' => $get['id']]); ?>
        <?php endif; ?>

        <?php $dodaj = Url::toRoute(['osoby/dodaj', 'kh_id' => $get['id']]); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj pracownika</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Imię
                    </td>
                    <td scope="col">
                        Nazwisko
                    </td>
                    <td scope="col">
                        Email
                    </td>
                    <td scope="col">
                        Telefon
                    </td>
                    <td scope="col">
                        Komórka
                    </td>
                       <td scope="col">
                        Stanowisko
                    </td>
                       <td scope="col">
                        GG
                    </td>
                     <td scope="col">
                        Trans
                    </td>
                     <td scope="col">
                        Dział
                    </td>
                </tr>
                <?php foreach ($osoby as $osoba): ?>      
                    <?php $url = Url::toRoute(['osoby/edycja', 'id' => $osoba['osoba_id'], 'kh_id' => $get['id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                          <td scope="row">
                            <?php echo $osoba['osoba_imie']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $osoba['osoba_nazwisko']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $osoba['osoba_email']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $osoba['osoba_telefon']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $osoba['osoba_komorka']; ?>
                        </td>
                         <td scope="row">
                            <?php echo $osoba['osoba_stanowisko']; ?>
                        </td>
                         <td scope="row">
                            <?php echo $osoba['osoba_gg']; ?>
                        </td>
                         <td scope="row">
                            <?php echo $osoba['osoba_trans']; ?>
                        </td>
                         <td scope="row">
                            <?php echo $osoba['osoba_dzial']; ?>
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

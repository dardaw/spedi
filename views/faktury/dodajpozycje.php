<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Pozycje faktury';
?>
<div class="site-index">



    <div class="body-content">

        <?php $dodaj = Url::toRoute(['faktury/dodajpozycjedodaj', 'id' => $id]); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj pozycję faktury</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                       Nazwa
                    </td>
                    <td scope="col"> 
                        Jednostka
                    </td>
                    <td scope="col">
                        Cena brutto PLN
                    </td>
                    <td scope="col">
                        Cena brutto waluta
                    </td>
                    <td scope="col">
                        Waluta
                    </td>
                </tr>
                <?php foreach ($faktura_pozycje as $faktura_pozycja): ?>      
                    <?php $url = Url::toRoute(['faktury/dodajpozycjeedytuj', 'poz_id' => $faktura_pozycja['poz_id'], 'id' => $id]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php echo $faktura_pozycja['poz_nazwa']; ?>
                        </td>
                        <td>
                            <?php echo $faktura_pozycja['poz_jednostka']; ?>
                        </td>
                        <td>
                            <?php echo $faktura_pozycja['poz_wartosc_brutto']; ?>
                        </td>
                        <td>
                            <?php echo $faktura_pozycja['poz_wartosc_brutto_waluta']; ?>
                        </td>
                        <td>
                            <?php echo $faktura_pozycja['poz_waluta']; ?>
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

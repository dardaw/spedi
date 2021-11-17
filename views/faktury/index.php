<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Faktury';
?>
<div class="site-index">



    <div class="body-content">

        <?php $dodaj = Url::toRoute(['faktury/dodaj']); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj fakturę</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Numer faktury
                    </td>
                    <td scope="col"> 
                        Data wystawienia
                    </td>
                    <td scope="col">
                        Kontrahent
                    </td>
                    <td scope="col">
                        Wartość
                    </td>
                    <td scope="col">
                        Waluta
                    </td>
                </tr>
                <?php foreach ($faktury as $faktura): ?>      
                    <?php $url = Url::toRoute(['faktury/edycja', 'id' => $faktura['fak_id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php echo $faktura['fak_numer_pelny']; ?>
                        </td>
                        <td>
                            <?php echo $faktura['fak_data_wystawienia']; ?>
                        </td>
                        <td>
                            <?php echo $faktura['fak_nabywca_nazwa']; ?>
                        </td>
                        <td>
                            <?php echo $faktura['fak_wartosc_brutto']; ?>
                        </td>
                        <td>
                            <?php echo $faktura['fak_waluta']; ?>
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

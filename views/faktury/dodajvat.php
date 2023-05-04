<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'VAT';
?>
<div class="site-index">



    <div class="body-content">

        <?php $dodaj = Url::toRoute(['faktury/edycja', 'id' => $id]); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Wróć do faktury</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Procent
                    </td>
                    <td scope="col"> 
                        Waluta
                    </td>
                    <td scope="col">
                        Wartość netto
                    </td>
                    <td scope="col">
                        VAT
                    </td>
                    <td scope="col">
                        Wartość brutto
                    </td>
                </tr>
                <?php foreach ($faktura_vat as $vat): ?>      
                    <?php $url = Url::toRoute(['faktury/dodajvatedytuj', 'fak_vat_id' => $vat['fak_vat_id'], 'id' => $id]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php
                            if (is_numeric($vat['fak_vat_procent']))
                                echo $vat['fak_vat_procent'] . ' %';
                            else
                                echo $vat['fak_vat_procent'];
                            ?>
                        </td>
                        <td>
                            <?php echo $vat['fak_vat_waluta']; ?>
                        </td>
                        <td>
                            <?php echo $vat['fak_vat_wartosc_netto']; ?>
                        </td>
                        <td>
                            <?php echo $vat['fak_vat_wartosc_vat']; ?>
                        </td>
                        <td>
                            <?php echo $vat['fak_vat_wartosc_brutto']; ?>
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

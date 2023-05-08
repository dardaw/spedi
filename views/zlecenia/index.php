<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Zlecenia';
?>
<div class="site-index">



    <div class="body-content">

        <?php $dodaj = Url::toRoute(['zlecenia/dodaj']); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj zlecenie</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Numer zlecenia
                    </td>
                    <td scope="col"> 
                        Data utworzenia
                    </td>
                    <td scope="col">
                        Ładunek
                    </td>
                    <td scope="col">
                        Klient
                    </td>
                    <td scope="col">
                        Data załadunku
                    </td>
                    <td scope="col">
                        Miasto załadunku
                    </td>
                    <td scope="col">
                        Kod p. załadunku
                    </td>
                    <td scope="col">
                        Kraj załadunku
                    </td>
                    <td scope="col">
                        Data rozładunku
                    </td>
                    <td scope="col">
                        Miasto rozładunku
                    </td>
                    <td scope="col">
                        Kod p. rozładunku
                    </td>
                    <td scope="col">
                        Kraj rozładunku
                    </td>
                    <td scope="col">
                        Przewoźnik
                    </td>
                </tr>
                <?php foreach ($zlecenia as $zlecenie): ?>      
                    <?php $url = Url::toRoute(['zlecenia/edycja', 'id' => $zlecenie['zl_id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php echo $zlecenie['zl_numer_pelny']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_data_utworzenia']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_ladunek']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['klient_nazwa']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_data_zaladunku']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_miasto_zaladunku']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_kod_pocztowy_zaladunku']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_kraj_zaladunku']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_data_rozladunku']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_miasto_rozladunku']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_kod_pocztowy_rozladunku']; ?>
                        </td>
                        <td>
                            <?php echo $zlecenie['zl_kraj_rozladunku']; ?>
                        </td>
                         <td>
                            <?php echo $zlecenie['przewoznik_nazwa']; ?>
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

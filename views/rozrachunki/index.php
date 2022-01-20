<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Rozrachunki';
?>
<div class="site-index">



    <div class="body-content">
        <?php $dodaj = Url::toRoute(['rozrachunki/dodaj']); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj rozrachunek</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Typ
                    </td>
                    <td scope="col"> 
                        Numer zlecenia
                    </td>
                    <td scope="col"> 
                        Dokument
                    </td>
                    <td scope="col"> 
                        Kontrahent
                    </td>
                    <td scope="col"> 
                        Stawka brutto
                    </td>
                    <td scope="col"> 
                        Waluta
                    </td>
                    <td scope="col"> 
                        Termin płatności
                    </td>
                    <td scope="col"> 
                        Dni spóźnienia
                    </td>
                    <td scope="col"> 
                        Data ostatniej spłaty
                    </td>
                    <td scope="col"> 
                        Kwota ostatniej spłaty
                    </td>
                </tr>
                <?php foreach ($rozrachunki as $roz): ?>      
                    <?php $url = Url::toRoute(['rozrachunki/edycja', 'roz_id' => $roz['roz_id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php echo $roz['roz_typ']; ?>
                        </td>
                        <td>
                            <?php echo $roz['roz_numer_zlecenia']; ?>
                        </td>
                        <td>
                            <?php echo $roz['roz_numer_faktury']; ?>
                        </td>
                        <td>
                            <?php echo $roz['kh_symbol']; ?>
                        </td>
                        <td>
                            <?php echo $roz['roz_kwota_brutto']; ?>
                        </td>
                        <td>
                            <?php echo $roz['roz_waluta']; ?>
                        </td>
                        <td>
                            <?php if (!empty($roz['roz_data_powstania']) && !empty($roz['roz_termin_platnosci'])): ?>
                                <?php
                                $data_termin_platnosci = new DateTime($roz['roz_data_powstania']);
                                $data_termin_platnosci->modify("+" . $roz['roz_termin_platnosci'] . ' days');
                                ?>
                                <?php echo $data_termin_platnosci->format("Y-m-d") . '(' . $roz['roz_termin_platnosci'] . ')'; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (!empty($roz['roz_data_powstania']) && !empty($roz['roz_termin_platnosci'])): ?>
                                <?php
                                $teraz = new DateTime("NOW");
                                $dni_spoznienia = $data_termin_platnosci->diff($teraz);
                                $dni = $dni_spoznienia->days;
                                if($dni_spoznienia->invert == 1)
                                    $dni = '-' . $dni;
                                ?>
                                <?php echo $dni; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo $roz['roz_data_ostatniej_splaty']; ?>
                        </td>
                        <td>
                            <?php echo $roz['roz_kwota_ostatniej_splaty']; ?>
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

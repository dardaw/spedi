<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Dokumenty';
?>
<div class="site-index">



    <div class="body-content">

        <?php $dodaj = Url::toRoute(['dokumenty/dodaj', 'id' => $get['id']]); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj link</button></a>
        <?php $wroc = Url::toRoute(['zlecenia/edycja', 'id' => $get['id']]); ?>
        <a href="<?php echo $wroc ?>"><button type="button" class="btn btn-primary">Wróc do zlecenia</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        L.p.
                    </td>
                    <td scope="col"> 
                        Data utworzenia
                    </td>
                    <td scope="col">
                        Nazwa
                    </td>
                    <td scope="col">
                        Opis
                    </td>
                    <td scope="col">
                        Link
                    </td>
                    <td scope="col">
                        Pobierz
                    </td>
                    <td scope="col">
                        Usuń link
                    </td>
                </tr>
                <?php $ktory = 0; ?>
                <?php foreach ($dokumenty as $dokument): ?>      
                    <tr>
                        <td scope="row">
                            <?php echo ++$ktory; ?>
                        </td>
                        <td>
                            <?php echo $dokument['dok_data']; ?>
                        </td>
                        <td>
                            <?php echo $dokument['dok_nazwa']; ?>
                        </td>
                        <td>
                            <?php echo $dokument['dok_opis']; ?>
                        </td>
                        <td>
                            <?php echo $dokument['dok_link']; ?>
                        </td>
                        <td>
                            <button type="button" link='<?php echo $dokument['dok_link']; ?>' class="btn btn-primary pobierz_plik">Pobierz</button>
                        </td>
                        <td>
                            <?php $link = Url::toRoute(['dokumenty/usun', 'dok_id' => $dokument['dok_id'], 'id' => $get['id']]); ?>
                            <a href="<?php echo $link ?>"><button type="button" class="btn btn-primary">Usuń</button></a>
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

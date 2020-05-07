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

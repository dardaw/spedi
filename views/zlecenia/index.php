<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Zlecenia';
?>
<div class="site-index">



    <div class="body-content">

        <div class="row">
            <table class="table table-bordered">
                <tr>
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
                <?php $url = Url::toRoute(['zlecenia/edycja', 'id' => 42]); ?>
                <?php foreach ($zlecenia as $zlecenie): ?>      
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

    </div>
</div>

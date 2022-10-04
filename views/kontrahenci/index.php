<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Kontrahenci';
?>
<div class="site-index">



    <div class="body-content">

        <?php $dodaj = Url::toRoute(['kontrahenci/dodaj']); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj kontrahenta</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Numer kontrahenta
                    </td>
                    <td scope="col"> 
                        Data utworzenia
                    </td>
                    <td scope="col"> 
                        Symbol
                    </td>
                    <td scope="col"> 
                        Nazwa pełna
                    </td>
                </tr>
                <?php foreach ($kontrahenci as $kontrahent): ?>      
                    <?php $url = Url::toRoute(['kontrahenci/edycja', 'id' => $kontrahent['kh_id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php echo $kontrahent['kh_numer_pelny']; ?>
                        </td>
                        <td>
                            <?php echo $kontrahent['kh_data_utworzenia']; ?>
                        </td>
                        <td>
                            <?php echo $kontrahent['kh_symbol']; ?>
                        </td>
                        <td>
                            <?php echo $kontrahent['kh_nazwa_pelna']; ?>
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

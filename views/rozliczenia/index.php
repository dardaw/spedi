<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Rozliczenia rozrachunku';
?>
<div class="site-index">



    <div class="body-content">
        <?php $dodaj = Url::toRoute(['rozliczenia/dodaj', 'roz_id' => $get['roz_id']]); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Rozlicz</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Data rozliczenia
                    </td>
                    <td scope="col"> 
                        Wartość
                    </td>
                    <td scope="col"> 
                        Waluta
                    </td>
                    <td scope="col"> 
                        Opis
                    </td>
                    <td scope="col"> 
                        Rozliczył
                    </td>
                </tr>
                <?php foreach ($rozliczenia as $roz): ?>      
                    <tr>
                        <td scope="row">
                            <?php echo $roz['rozl_data']; ?>
                        </td>
                        <td>
                            <?php echo $roz['rozl_wartosc']; ?>
                        </td>
                        <td>
                            <?php echo $roz['rozl_waluta']; ?>
                        </td>
                        <td>
                            <?php echo $roz['rozl_opis']; ?>
                        </td>
                        <td>
                            <?php echo $roz['uz_id']; ?>
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

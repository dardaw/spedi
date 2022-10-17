<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Firmy';
?>
<div class="site-index">



    <div class="body-content">

        <?php $dodaj = Url::toRoute(['firmy/dodaj']); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj firmę</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Symbol
                    </td>
                    <td scope="col"> 
                        Nazwa firmy
                    </td>
                    <td scope="col"> 
                        NIP
                    </td>
                </tr>
                <?php foreach ($firmy as $firma): ?>      
                    <?php $url = Url::toRoute(['firmy/edycja', 'id' => $firma['firma_id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php echo $firma['firma_symbol']; ?>
                        </td>
                        <td>
                            <?php echo $firma['firma_nazwa']; ?>
                        </td>
                        <td>
                            <?php echo $firma['firma_nip']; ?>
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

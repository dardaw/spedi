<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Użytkownicy';
?>
<div class="site-index">



    <div class="body-content">

        <?php $dodaj = Url::toRoute(['uzytkownicy/dodaj']); ?>
        <a href="<?php echo $dodaj ?>"><button type="button" class="btn btn-primary">Dodaj użytkownika</button></a>
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Nazwisko
                    </td>
                    <td scope="col"> 
                        Imię
                    </td>
                    <td scope="col"> 
                        Login
                    </td>
                </tr>
                <?php foreach ($uzytkownicy as $uzytkownik): ?>      
                    <?php $url = Url::toRoute(['uzytkownicy/edycja', 'id' => $uzytkownik['uz_id']]); ?>
                    <tr gdzie="<?php echo $url; ?>">
                        <td scope="row">
                            <?php echo $uzytkownik['uz_nazwisko']; ?>
                        </td>
                        <td>
                            <?php echo $uzytkownik['uz_imie']; ?>
                        </td>
                        <td>
                            <?php echo $uzytkownik['uz_login']; ?>
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

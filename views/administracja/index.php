<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Administracja';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Ikona
                    </td>
                    <td scope="col"> 
                        Opis
                    </td>
                </tr>
                <tr>
                    <td scope="col">
                        <?php $url = Url::toRoute(['firmy/index']); ?>
                        <button type="button" class="btn btn-default btn-lg">
                            <a href="<?php echo $url; ?>"><span class="glyphicon glyphicon-flag" aria-hidden="true"> Firma</span></a>
                        </button>
                    </td>
                    <td scope="col"> 
                        Dodawanie lub edycja nowej firmy
                    </td>
                </tr>
                <tr>
                    <td scope="col">
                        <?php $url = Url::toRoute(['uzytkownicy/index']); ?>
                        <button type="button" class="btn btn-default btn-lg">
                            <a href="<?php echo $url; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"> Użytkownicy</span></a>
                        </button>
                    </td>
                    <td scope="col"> 
                        Dodawanie lub edycja użytkownika do firmy
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Błędy';
?>
<div class="site-index">



    <div class="body-content">
        <br />
        <br />
        <div class="row">
            <table class="table table-bordered">
                <tr class="pierwsza">
                    <td scope="col">
                        Id
                    </td>
                    <td scope="col">
                        Data logu
                    </td>
                    <td scope="col">
                        Level
                    </td>
                    <td scope="col">
                        Category
                    </td>
                    <td scope="col">
                        Log Time
                    </td>
                    <td scope="col">
                        Prefix
                    </td>
                    <td scope="col">
                        Message
                    </td>
                </tr>
                <?php foreach ($bledy as $blad): ?>      
                    <tr>
                        <td scope="row">
                            <?php echo $blad['log_id']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $blad['data_logu']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $blad['level']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $blad['category']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $blad['log_time']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $blad['prefix']; ?>
                        </td>
                        <td scope="row">
                            <?php echo nl2br($blad['message']); ?>
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

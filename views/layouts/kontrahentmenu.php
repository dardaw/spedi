<?php

use yii\helpers\Url;
?>
<?php $url = Url::toRoute(['kontrahenci/edycja', 'id' => $kh_id]); ?>
<a href="<?php echo $url; ?>">
    <button type="button" class="btn btn-primary">Kontrahent</button>
</a>
<?php $url = Url::toRoute(['rachunki/index', 'id' => $kh_id]); ?>
<a href="<?php echo $url; ?>">
    <button type="button" class="btn btn-primary">Rachunki bankowe</button>
</a>
<br />
<br />
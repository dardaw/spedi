<?php

use yii\helpers\Url;
?>
  <?php $url = Url::toRoute(['zlecenia/edycja', 'id' => $zl_id]); ?>
<a href="<?php echo $url; ?>">
    <button type="button" class="btn btn-primary">Zlecenie</button>
</a>
  <?php $url = Url::toRoute(['adresy/index', 'id' => $zl_id]); ?>
<a href="<?php echo $url; ?>">
    <button type="button" class="btn btn-primary">Adresy</button>
</a>
  <?php $url = Url::toRoute(['trasy/edycja', 'id' => $zl_id]); ?>
<a href="<?php echo $url; ?>">
    <button type="button" class="btn btn-primary">Trasa</button>
</a>
<br />
<br />
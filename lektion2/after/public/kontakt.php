<?php
  require_once('../config.php');
  require_once(ROOT_PATH.'/header.php');
?>

<form class="form-horizontal" method="post" action="">
  <?php echo form_input('text', 'name', 'Namn:', 'Namn') ?>
  <?php echo form_input('email', 'email', 'E-post:', 'Ange din e-postadress') ?>
  <?php echo text_area('message', 'Meddelande'); ?>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Skicka meddelande</button>
    </div>
  </div>
</form>

<?php require_once('../footer.php'); ?>
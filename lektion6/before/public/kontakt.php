<?php
  require_once('../config.php');
  $page_title = "Kontakt";
?>

<?php require_once(ROOT_PATH.'/header.php'); ?>

<h1><?php echo $page_title; ?></h1>

<p class="lead">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</p>

<div class="row-fluid">
  <div class="span8">
    <form class="form-horizontal" method="post" action="">
      <fieldset>
        <?php echo form_input('text', 'name', 'Namn:', 'Namn') ?>
        <?php echo form_input('email', 'email', 'E-post:', 'Ange din e-postadress') ?>
        <?php echo text_area('message', 'Meddelande'); ?>
        <?php echo submit_button('Skicka meddelande'); ?>
      </fieldset>
    </form>
  </div>
  <div class="span4">
    <ul>
      <li></i><a href="http://github.com/olkarls">Github</a></li>
      <li><a href="http://twitter.com/olkarls">Twitter</a></li>
      <li><a href="mailto:olkarls@gmail.com">E-post</a></li>
    </ul>
  </div>
</div>

<?php require_once('../footer.php'); ?>



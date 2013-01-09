<?php

  require_once('../../config.php');
  require_once(ROOT_PATH.'/classes/item.php');

  if (isset($_POST) && isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == USER && $password == PASS) {
      $_SESSION['is_logged_in'] = true;

      if (isset($_SESSION['return_to'])) {
        $return_to = $_SESSION['return_to'];
        $_SESSION['return_to'] = null;
        header('location: '.$return_to);
      } else {
        header('location: /admin');
      }
    }
  }

  $page_title = "Logga in";

?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<div class="row-fluid marketing">
  <div class="span12">
    <h1>Logga in</h1>
    <form method="post" action="/admin/login.php">
      <?php echo form_input('text', 'username', 'Användarnamn: '); ?>
      <?php echo form_input('password', 'password', 'Lösenord: '); ?>
      <?php echo submit_button('Logga in'); ?>
    </form>
  </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>
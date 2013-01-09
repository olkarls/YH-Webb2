<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $page_title; ?></title>
    <link href="/styles/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/styles/application.css" rel="stylesheet" media="screen">
    <link href="/styles/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container-narrow">
      <?php echo get_feedback(); ?>
      <?php if (isset($_SESSION['is_logged_in'])) : ?>
        <div id="user_info">
          <p>Inloggad som <?php echo USER ?> <a href="/admin/logout.php">logga ut</a>.
          </p>
        </div>
      <?php endif ?>
      <div class="masthead">
        <?php require_once('menu.php'); ?>
        <h3>
          <a class="muted" href="/">
            <img src="http://www.gravatar.com/avatar/4cf5448304e7cdcac5cda84f978bafc7?s=25">
            <span>Ola Karlsson</span>
          </a>
        </h3>
      </div>
      <hr>
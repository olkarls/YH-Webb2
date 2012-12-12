<?php

  $menu = array();
  $menu[] = array('text' => 'Hem', 'url' => '/');
  $menu[] = array('text' => 'Portfolio', 'url' => '/portfolio.php');
  $menu[] = array('text' => 'Kontakt', 'url' => '/kontakt.php');
?>

<?php $current_url = $_SERVER['REQUEST_URI']; ?>

<ul class="nav nav-pills pull-right">
  <?php foreach ($menu as $menu_item) : ?>

    <?php
      $cssClass = '';

      if ($menu_item['url'] == $current_url) {
        $cssClass = ' class="active"';
      }
    ?>

    <li<?php echo $cssClass; ?>>
      <a href="<?php echo $menu_item['url']; ?>">
        <?php echo $menu_item['text']; ?>
      </a>
    </li>
  <?php endforeach ?>
</ul>
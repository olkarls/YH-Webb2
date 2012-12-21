<?php
  require_once('../config.php');

  $page_title = "Ola Karlsson – Utvecklare från Växjö";

  $db = new Db();
  $items = $db->query('SELECT * FROM items LIMIT 2', 'item');

?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php echo hero('Ola Karlsson', 'Utvecklare, företagare och utbildningsledare från Växjö.<br>Hjälper dig med Ruby, iOS, C#, JavaScript &amp; HTML5.'
, '/portfolio.php', 'Se alla referenser'); ?>


<div class="row-fluid marketing">
  <?php foreach ($items as $item) : ?>
      <div class="span6 portfolio-item">
        <a href="/show.php?id=<?php echo $item->id ?>">
          <img src="http://placehold.it/100x100" class="img-polaroid">
        </a>
        <h4>
          <a href="/show.php?id=<?php echo $item->id ?>">
            <?php echo $item->title ?>
          </a>
        </h4>
        <p><?php echo nl2br($item->text) ?></p>
        <p><a class="btn btn-mini btn-success" href="/show.php?id=<?php echo $item->id ?>">Se mer &raquo;</a></p>
    </div>
  <?php endforeach ?>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>
<?php require_once('../header.php'); ?>

<form class="form-horizontal" method="post">
  <div class="control-group">
    <label class="control-label" for="name">Namn: </label>
    <div class="controls">
      <input type="text" id="name" placeholder="Namn">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="email">E-post</label>
    <div class="controls">
      <input type="text" id="email" placeholder="E-post">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="message">Meddelande</label>
    <div class="controls">
      <textarea id="message" rows="3"></textarea>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Skicka meddelande</button>
    </div>
  </div>
</form>

<?php require_once('../footer.php'); ?>
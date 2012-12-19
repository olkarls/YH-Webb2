<?php
  function form_control_wrapper() {
    return '<div class="control-group">';
  }

  function form_label($for, $text) {
    return '<label class="control-label" for="'.$for.'">'.$text.'</label>';
  }

  function text_area($name, $label_text, $value = '') {
    $html = form_control_wrapper();
    $html .= form_label($name, $label_text);
    $html .= '<div class="controls">';
    $html .= '<textarea id="'.$name.'" name="'.$name.'" rows="3">'.$value.'</textarea>';
    $html .= "</div>";
    $html .= "</div>";

    return $html;
  }

  function select($name, $title, $items, $selected_id = null) {
    $html = '<select name="'.$name.'">';
    $html .= '<option>-- Välj --</option>';

    foreach ($items as $item) {
      $selected = '';
      if ($selected_id && $selected_id == $item->id) {
        $selected = ' selected="selected"';
      }
      $html .= '<option'.$selected.' value="'.$item->id.'">'.$item->name.'</option>';
    }
    $html .= '</select>';
    return $html;
  }

  function submit_button($text) {
    $html  = '<div class="control-group">';
    $html .= '<div class="controls">';
    $html .= '<button type="submit" class="btn btn-primary">'.$text.'</button>';
    $html .= '</div>';
    $html .= '</div>';

    return $html;

  }

  function form_input($type, $name, $label_text, $value = '', $placeholder_text = '') {

    $html  = '<div class="control-group">';
    $html .= form_label($name, $label_text);
    $html .= '<div class="controls">';
    $html .= '<input value="'.$value.'" placeholder="'.$value.'" type="'.$type.'" id="'.$name.'" name="'.$name.'"'.$placeholder_text.'>';
    $html .= '</div>';
    $html .= '</div>';

    return $html;
  }

  function portfolio_item($item) {
      $html = '<article class="portfolio-item">';
      $html .= '<a href="/show.php?id='.$item->id.'">';
      $html .= '<img src="http://placehold.it/100x100" class="img-polaroid">';
      $html .= '</a>';
      $html .= '<h4><a href="/show.php?id='.$item->id.'">'.$item->title.'</a></h4>';
      $html .= '<p>'.nl2br($item->text).'</p>';
      $html .= '<p><a class="btn btn-mini btn-success" href="/show.php?id='.$item->id.'">Se mer &raquo;</a></p>';
      $html .= '</article>';

      return $html;
  }

  function hero($heading, $text, $button_link = null, $button_text = null) {
    $format = '<div class="jumbotron"><h1>%s</h1><p class="lead">%s</p>';
    $html = sprintf($format, $heading, $text);

    if ($button_link) {
      $html .= '<a class="btn btn-large btn-success" href="'.$button_link.'">'.$button_text.'</a>';
    }

    $html .= '</div><hr>';
    return $html;
  }

  function set_feedback($status, $text) {
    $_SESSION['feedback'] = array('status' => $status, 'text' => $text);
  }

  function get_feedback() {
    $html = "";
    if (isset($_SESSION['feedback'])) {
      $html .= '<div class="alert alert-'.$_SESSION['feedback']['status'].'">';
      $html .= '<button type="button" class="close" data-dismiss="alert">×</button>';
      $html .= $_SESSION['feedback']['text'];
      $html .= '</div>';
      $_SESSION['feedback'] = null;
    }
    return $html;
  }



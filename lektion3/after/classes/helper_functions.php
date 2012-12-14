<?php
  function form_control_wrapper() {
    return '<div class="control-group">';
  }

  function form_label($for, $text) {
    return '<label class="control-label" for="'.$for.'">'.$text.'</label>';
  }

  function text_area($name, $label_text) {
    $html = form_control_wrapper();
    $html .= form_label($name, $label_text);
    $html .= '<div class="controls">';
    $html .= '<textarea id="'.$name.'" name="'.$name.'" rows="3"></textarea>';
    $html .= "</div>";
    $html .= "</div>";

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

  function form_input($type, $name, $label_text, $placeholder_text = null) {
    if ($placeholder_text != null) {
      $placeholder_text = ' placeholder="'.$placeholder_text.'"';
    } else {
      $placeholder_text = '';
    }

    $html  = '<div class="control-group">';
    $html .= form_label($name, $label_text);
    $html .= '<div class="controls">';
    $html .= '<input type="'.$type.'" id="'.$name.'" name="'.$name.'"'.$placeholder_text.'>';
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



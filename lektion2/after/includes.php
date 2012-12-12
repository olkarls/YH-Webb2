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



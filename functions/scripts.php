<?php

function darshan_load_scripts(){
  wp_enqueue_style('main', get_template_directory_uri()."/css/main.css");

  wp_enqueue_script('main', get_template_directory_uri()."/js/main.js", null, false, true);
}

add_action('wp_enqueue_scripts', 'darshan_load_scripts');

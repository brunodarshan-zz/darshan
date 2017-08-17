<?php




function darshan_custom_sessions(){
  $labels = array(
      'name'=> 'Sessions',
      'singular_name'=> 'Session',
      'add_new'=> 'New Session',
      'add_new_item' => 'New Item Session',
      'edit_item'=> 'Edit Session',
      'not_found'=> 'Session Not Found',
      'all_items'=> 'All Sessions',
      ''
  );

  $args = array(
  		'labels'             => $labels,
  		'public'             => true,
  		'publicly_queryable' => false,
  		'show_ui'            => true,
  		'show_in_menu'       => true,
  		'query_var'          => true,
  		'rewrite'            => array( 'slug' => 'session' ),
  		'capability_type'    => 'post',
  		'has_archive'        => true,
  		'hierarchical'       => false,
  		'menu_position'      => null,
  		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
  	);

    register_post_type('sessions', $args);
}

function sessions_metaboxes(){
  add_meta_box('template-session', 'Template de Session', 'template_session_cb', 'sessions', 'side', 'high');

  function template_session_cb(){
    $values = get_post_custom($post->ID);
    // $text = isset( $values['template-session'] ) ? esc_attr( $values['template-session'][0] ) : '';
    $selected = isset( $values['template_select'] ) ? esc_attr( $values['template_select'][0] ) : '';
    // $check = isset( $values['meta_box_check'] ) ? esc_attr( $values['meta_box_check'][0] ) : '';
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
   ?>
   <p>
     <label for="template-session">Template Session</label>
     <select name="template_select">
        <option value="style_1">style 1</option>
      </select>
   </p>
    <?php
  }

}


function template_session_save($post_id){
          if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

          if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

          if( !current_user_can( 'edit_post' ) ) return;

          $allowed = array( 'a' => array( 'href' => array() ) );

          if( isset( $_POST['meta_box_select'] ) )
          update_post_meta( $post_id, 'template_select', esc_attr( $_POST['template_select'] ) );
        }

add_action('save_post', 'template_session_save');
add_action('init', 'darshan_custom_sessions');
add_action('add_meta_boxes', 'sessions_metaboxes');

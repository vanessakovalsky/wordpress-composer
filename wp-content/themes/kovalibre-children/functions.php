<?php

function kovalibre_children_remove_kovalibre_shortcode(){
    remove_shortcode('kovalibre');
    add_shortcode('kovalibre', 'children_shortcode');
}

add_action('after_setup_theme','kovalibre_children_remove_kovalibre_shortcode');

function children_shortcode(){
    return 'Toto';
}
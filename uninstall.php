<?php

if (!defined('WP_UNINSTALL_PLUGINS')) {
    die;
}
//delete data from tabels
#get all posts which books
$books = get_posts(array("post_type" => 'book'));
#loop for delete post
foreach ($books as $book) {
    wp_delete_post($book->ID, true);
}

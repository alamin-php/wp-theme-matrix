<?php 
single_cat_title(  );
$matrix_current_tram = get_queried_object(  );

$matrix_tram_thumbnail_id = get_field("thumbnail", $matrix_current_tram);
if($matrix_tram_thumbnail_id){
    $file_thumb_details = wp_get_attachment_image_src( $matrix_tram_thumbnail_id);
    echo "<img src='".esc_url( $file_thumb_details[0] )."'/>";
}
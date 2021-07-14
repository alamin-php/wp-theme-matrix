<div class="container post-pagination">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <?php the_posts_pagination(array(
                "screen_reader_text" => " ",
                "prev_text" => __("Latest Posts", "matrix"),
                "next_text" => __("Next Posts", "matrix"),
            )); ?>
        </div>
    </div>
</div>
</div>
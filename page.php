<?php 
/**
 * This Page will define as a header
 */
?>
    <?php get_header() ?>

<?php if ( have_posts(  ) ):
    while( have_posts(  ) ): the_post(  );
?>
   <?php
   the_title();
   the_post_thumbnail();
   the_excerpt();
   ?>
<?php 
    endwhile;
endif;
?>

    <?php get_footer() ?>
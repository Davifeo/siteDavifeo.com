<?php 
$bloggrid_col = !empty(ckav_theme_option( "customizer", "bloggrid-col", '3')) ? 'eq'.ckav_theme_option( "customizer", "bloggrid-col", '3') : 'eq3'; 
$bloggrid_gt = !empty(ckav_theme_option( "customizer", "bloggrid-gt", 'gt30 mb30')) ? ' '.ckav_theme_option( "customizer", "bloggrid-gt", 'gt30 mb30' ) : ' gt30 mb30';
?>

<?php if ( have_posts() ) : ?>
<div class="masonry-wrp">
    <div class="<?php echo esc_attr($bloggrid_col) . esc_attr($bloggrid_gt); ?> rw blogpost-grid masonry-grid" data-masonry-grid="y">
        <?php
        while ( have_posts() ) : the_post(); ?>
        <div class="masonry-item cl">
            <?php get_template_part( 'template-parts/blog/content' ); ?>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
wp_reset_postdata();

else :
    // If no content, include the "No posts found" template.
    get_template_part( 'template-parts/blog/content', 'none' );
    
endif;

// Previous/next page navigation.
function_exists( 'fw_theme_paging_nav' ) ? fw_theme_paging_nav() : null; ?>
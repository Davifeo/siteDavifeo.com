<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }  ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'ckav-postbox' ); ?>>
    <?php if (has_post_thumbnail(get_the_ID())) { ?>
    <figure class="bg-cc bg-cover" data-bg="<?php echo ckav_post_thumb('url'); ?>">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="figure-link"></a>
        <?php echo ckav_post_thumb('img'); ?>
    </figure>
    <?php } ?>
    
    <div class="info">
        
        <div class="ckav-meta-wrp">
            <?php if (is_sticky()) { ?>
            <i class="fas fa-bookmark"></i>
            <?php } ?>
           
            <?php the_title( '<h2 class="content-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
            <ul class="row ckav-post-meta gt0">
                <li class="col-auto"><?php ckav_post_meta('author'); ?></li>
                <li class="col-auto"><?php echo get_the_date(); ?></li>
                <?php if (ckav_theme_option( "customizer", "blogpost-cat", 'yes') === "yes") { ?>
                <li class="col-auto"><?php ckav_post_meta('category'); ?></li>
                <?php } ?>
            </ul>
        </div>

        <?php if (ckav_theme_option( "customizer", "blogpost-desc", 'yes') === "yes") { ?>
        <?php if (!empty(get_the_excerpt())) { ?>
        <div class="post-text">
            <?php echo wp_trim_words( get_the_excerpt() , '40' ); ?>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
</article>
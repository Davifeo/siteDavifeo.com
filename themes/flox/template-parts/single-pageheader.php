<?php $sticky_cls = is_sticky() ? "sticky-post-tag" : ""; ?>
<header class="single-post-header <?php echo esc_attr($sticky_cls); ?>">
					
    <?php if (is_sticky()) { ?>
    <i class="sticky-icon fas fa-bookmark"></i>
    <?php } ?>
    
    <h1 class="page-title mini"><?php echo get_the_title(); ?></h1>

    <?php if( is_singular( 'post' ) ) : ?>
    <ul class="row ckav-post-meta gt0">
        <li class="col-auto"><p><?php echo get_the_date(); ?></p></li>
        <li class="col-auto"><?php ckav_post_meta('author'); ?></li>
        <li class="col-auto"><?php ckav_post_meta('category'); ?></li>
    </ul>
    <?php endif; ?>

</header>
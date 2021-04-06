<header class="typo-light single-post-header portfolio-header">
    <?php if( get_the_terms( get_the_ID(), 'portfolio_cat' ) && count( get_the_terms( get_the_ID(), 'portfolio_cat' ) ) > 0 ) : ?>
    <div class="portfolio-cats">
        <?php foreach( get_the_terms( get_the_ID(), 'portfolio_cat' ) as $term ) :
        $term_link = get_term_link( $term->term_id ); ?>
        <a href="<?php echo esc_url( $term_link ); ?>" class="ckav-btn tag-btn light">
            <?php echo esc_attr( $term->name ); ?>
        </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
    <h1 class="page-title mini"><?php echo get_the_title(); ?></h1>

    <?php if( is_singular( 'portfolio' ) && !empty(ckav_theme_option('post', 'year')) || !empty(ckav_theme_option('post', 'client'))  || !empty(ckav_theme_option('post', 'url'))) : ?>
    <ul class="row ckav-post-meta gt0">
        <?php if ( !empty(ckav_theme_option('post', 'year')) ) { ?>
        <li class="col-auto"><?php echo esc_html__('Year: ', 'flox') . ckav_theme_option('post', 'year'); ?></li>
        <?php } ?>

        <?php if ( !empty(ckav_theme_option('post', 'client')) ) { ?>
        <li class="col-auto"><?php echo esc_html__('Client: ', 'flox') . ckav_theme_option('post', 'client'); ?></li>
        <?php } ?>

        <?php if ( !empty(ckav_theme_option('post', 'url')) ) { ?>
            <li class="col-auto"><?php echo esc_html__('URL: ', 'flox') . ckav_theme_option('post', 'url'); ?></li>
        <?php } ?>
    </ul>
    <?php endif; ?>
</header>
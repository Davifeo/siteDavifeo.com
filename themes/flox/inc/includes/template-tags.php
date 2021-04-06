<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );


/* Theme logo
/******************************/
function ckav_themelogo() {	

	$logo_img = ckav_theme_option( 'customizer', 'theme-logo' );

	if ( !empty($logo_img) ) {
		return ckav_imgresize( ckav_getkey('url', $logo_img), 400 );
	} else {
		return false;
	}
}


/**
 * Social profile html generate
 ******************************/
if ( ! function_exists( 'ckav_social_profile' ) ) :
	function ckav_social_profile($icon_classes = '', $img_classes = '')
	{
		$menu_social = ckav_social_profile_data(); 
		$html = '';
		if (!empty($menu_social)) {
			foreach ($menu_social as $social_icon) { 
				$target = $social_icon['target'] == 'yes' ? 'target="_blank"' : "";

				if ($social_icon['type'] === 'icon-social') {
					$html .= '<a href=" '.esc_url( $social_icon['url'] ).'" '. esc_attr($target) . ' title="'.esc_attr( $social_icon['name'] ).'" class="'.esc_attr( $icon_classes ).'" data-ckav-sm="mr-5"><i class="'. esc_attr( $social_icon['icon'] ) .'"></i></a>';
				}

				if ($social_icon['type'] === 'upload-icon') {
					$html .= '<a href="'.esc_url( $social_icon['url'] ).'" '. esc_attr($target) . ' title="'.esc_attr( $social_icon['name'] ).'" class="'.esc_attr( $img_classes ).'" data-ckav-sm="mr-5"><img src="'.esc_url( $social_icon['icon'] ).'" alt="'.esc_attr($social_icon['name']).'" /></a>';
				}
			
			} 
		}
		return $html;
	}
endif;


/* Pagination for blog posts
/******************************/
function fw_theme_paging_nav( $wp_query = null ) {

	if ( ! $wp_query ) {
		$wp_query = $GLOBALS['wp_query'];
	}

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}
	
	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
	
	// Set up paginated links.
	$links = paginate_links( array(
		'base'      => $pagenum_link,
		'format'    => $format,
		'total'     => $wp_query->max_num_pages,
		'current'   => $paged,
		'mid_size'  => 1,
		'add_args'  => array_map( 'urlencode', $query_args ),
		'prev_text' => esc_html__( 'Prev', 'flox' ),
		'next_text' => esc_html__( 'Next', 'flox' ),
	) );
	
	if ( $links ) :
		echo '<nav class="navigation paging-navigation" role="navigation"><div class="pagination loop-pagination">'.$links.'</div></nav>';
	endif;
}



/* Display link if menu not assigned
/******************************/
if ( ! function_exists( 'ckav_set_menu' ) ) :
	function ckav_set_menu() {
		if( current_user_can( 'manage_options' ) ) : ?>
			<a href="<?php echo admin_url('nav-menus.php?action=edit'); ?>">
				<?php esc_html_e('Click here to setup menu','flox'); ?>
			</a>
		<?php endif;
	}
endif;


/* Menu walker class
/******************************/
class ckav_nav_menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		if ($depth == 0) {
			$output .= "\n$indent<ul class=\"sub\">\n";
		}
		if ($depth >= 1) {
			$output .= "\n$indent<ul class=\"dropdown\">\n";
		}
	}

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;

		if ($depth != 0) {
			$item->classes[] = 'sub-menu-item';
			foreach ($item->classes as $itemKey => $itemClass) {
				if ($itemClass == "menu-item") {
					unset($item->classes[$itemKey]);
				}
			}
		}
		if (in_array("menu-item-has-children", $item->classes)) {
			$item->classes[] = 'has-dropdown';
		}

		$output .= "<li class='" .  esc_attr( implode(" ", $item->classes) ) . "'>";

		//Add SPAN if no Permalink
		if( $permalink && $permalink != '#' ) {
			$output .= '<a href="' . esc_url( $permalink ) . '">';
		} else {
			$output .= '<span>';
		}

		$output .= esc_attr( $title );

		if( $description != '' && $depth == 0 ) {
			$output .= '<small class="description">' . esc_html($description) . '</small>';
		}

		if( $permalink && $permalink != '#' ) {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
    }
}



/* Search form
/******************************/
if ( !function_exists( 'ckav_search_form' ) ) :
	function ckav_search_form() {

		$form = '
			<form method="get" class="search-frm" action="' . esc_url( home_url('/') ) . '">
				<input type="search" class="form-control" placeholder="'.esc_attr__( 'Search here...', 'flox' ).'" value="" name="s" title="' . esc_attr__( 'Search text', 'flox' ) . '" required />
				<button type="submit" class="ckav-btn">
					<i class="icon-magnifier"></i>
				</button>
			</form>';
		return $form;
	}
	add_filter( 'get_search_form', 'ckav_search_form' );
endif;



/* Post page links
/******************************/
if ( !function_exists( 'ckav_pagelinks' ) ) :
	function ckav_pagelinks() { 
		$args = array(
			'before' => '<div class="ckav-page-links">',
			'after' => '</div>',
		);
		wp_link_pages($args);
	}
endif;



/* Display navigation to next/previous post when applicable.
/******************************/
if ( ! function_exists( 'fw_theme_post_nav' ) ) :
    function fw_theme_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '',
            true );
        $next     = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous ) {
            return;
        }

        ?>
        <nav class="navigation post-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php echo esc_html__( 'Post navigation', 'flox' ); ?></h1>

            <div class="nav-links">
                <?php
                if ( is_attachment() ) :
                    previous_post_link( '%link', ckav_esc( '<span class="meta-nav">'.esc_html__( 'Published In', 'flox' ).'</span> %title' ) );
                else :
                    previous_post_link( '%link', ckav_esc( '<span class="meta-nav">'.esc_html__( 'Previous Post', 'flox' ).'</span> %title' ) );
                    next_post_link( '%link', ckav_esc( '<span class="meta-nav">'.esc_html__( 'Next Post', 'flox' ).'</span> %title' ) );
                endif;
                ?>
            </div>
            <!-- .nav-links -->
        </nav><!-- .navigation -->
    <?php
    }
endif;


/* Find out if blog has more than one category.
/******************************/
if ( ! function_exists( 'fw_theme_categorized_blog' ) ) : 
    function fw_theme_categorized_blog() {
        if ( false === ( $all_the_cool_cats = get_transient( 'fw_theme_category_count' ) ) ) {
            // Create an array of all the categories that are attached to posts
            $all_the_cool_cats = get_categories( array(
                'hide_empty' => 1,
            ) );

            // Count the number of categories that are attached to the posts
            $all_the_cool_cats = count( $all_the_cool_cats );

            set_transient( 'fw_theme_category_count', $all_the_cool_cats );
        }

        if ( 1 !== (int) $all_the_cool_cats ) {
            // This blog has more than 1 category so fw_theme_categorized_blog should return true
            return true;
        } else {
            // This blog has only 1 category so fw_theme_categorized_blog should return false
            return false;
        }
    }
endif;


/*
* Display an optional post thumbnail.
*
* Wraps the post thumbnail in an anchor element on index
* views, or a div element when on single views.
*************************/
if ( ! function_exists( 'fw_theme_post_thumbnail' ) ) :
    function fw_theme_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        $current_position = false;
        if (function_exists('fw_ext_sidebars_get_current_position')) {
            $current_position = fw_ext_sidebars_get_current_position();
        }

        if ( is_singular() ) :
            ?>

            <div class="post-thumbnail">
                <?php
                if ( ( in_array( $current_position,
                        array( 'full', 'left' ) ) || is_page_template( 'page-templates/full-width.php' )
                    || empty($current_position)
                )
                ) {
                    the_post_thumbnail( 'fw-theme-full-width' );
                } else {
                    the_post_thumbnail();
                }
                
                ?>
            </div>

        <?php else : ?>
            <?php
            if ( ( in_array( $current_position,
                    array( 'full', 'left' ) ) || is_page_template( 'page-templates/full-width.php' ) )
                    || empty($current_position)
            ) {
                $post_img = the_post_thumbnail( 'fw-theme-full-width' );
            } else {
                $post_img = the_post_thumbnail();
            }
            ?>
            <a class="post-thumbnail bg-cc bg-cover" style="background-image: url(<?php echo esc_url( $post_img ); ?>);" href="<?php the_permalink(); ?>">
                
            </a>

        <?php endif; // End is_singular()
    }
endif;



/* Get post meta information
/******************************/
if ( ! function_exists( 'ckav_post_meta' ) ) :
	function ckav_post_meta($type = '') { ?>
		<?php if ($type === "author"): ?>
			<p class="post-author">
				<?php esc_html_e( 'by&nbsp;', 'flox' ); ?> 
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author"><?php echo esc_attr( get_the_author() ); ?></a>
			</p>
		<?php endif; ?>

		<?php if ($type === "author1"): ?>
			<p class="post-author">
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author"><?php echo esc_attr( get_the_author() ); ?></a>
			</p>
		<?php endif; ?>

		<?php if ($type === "date"): ?>
			<p class="post-date">
				<time class="entry-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date('d').' ' . get_the_date('M') . ', ' . get_the_date('Y'); ?></time>
			</p>
		<?php endif; ?>

		<?php if ($type === "date1"): ?>
			<span class="entry-date-wrp">
				<time class="entry-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo '<span class="dd">'.get_the_date('d').'</span>' . get_the_date('M') . ' ' . get_the_date('Y'); ?></time>
			</span>
		<?php endif; ?>

		<?php if ($type === "category"): ?>
			<p class="post-categories"><?php echo get_the_term_list( get_the_ID(), 'category', '', ',&nbsp;&nbsp;', '' ) ?></p>	
		<?php endif; ?>

		<?php if ($type === "category1"): ?>
			<p class="post-categories"><?php echo get_the_term_list( get_the_ID(), 'category', '', '', '' ) ?></p>	
		<?php endif; ?>

		<?php if ($type === "prot_cat"): ?>
			<p class="post-categories"><?php echo get_the_term_list( get_the_ID(), 'portfolio_cat', '', '', '' ) ?></p>	
		<?php endif; ?>
	<?php }
endif;


/* Post thumbnail 
/******************************/
if ( ! function_exists( 'ckav_post_thumb' ) ) :
	function ckav_post_thumb($type = "fig") {

		if ($type == 'fig') {
			if (has_post_thumbnail(get_the_ID())) : ?>
			<figure>
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
			</figure>
			<?php else:
				return false;
			endif;
		}

		if ($type == 'url') {
			if (has_post_thumbnail(get_the_ID())) :
				return get_the_post_thumbnail_url();
			else:
				return NOIMG;
			endif;
		}

		if ($type == 'img') {
			if (has_post_thumbnail(get_the_ID())) :
				return get_the_post_thumbnail();
			else:
				return '<img src="' . esc_url(NOIMG) . '" alt=" '. esc_html__('image', 'flox') .'" />' ;
			endif;
		}
	}
endif;



/* Get posts count
/******************************/
if ( !function_exists( 'ckav_post_counting' ) ) :
	function ckav_post_counting( $posttype = 'post' ) {

		$count = 1;
		$status = false;
		$post_qry = new WP_Query( array( 'post_type' => $posttype, 'posts_per_page' => -1, 'fields' => 'ids', 'order' => 'ASC' ) );

		if( $post_qry->have_posts() ) :
			$current_post = $post_qry->post_count;
			foreach ( $post_qry->posts as $id ) :

				if( $id == get_the_ID() ) :
					$status = true;
				elseif( $status == false ) :
					$count++;
				endif;

			endforeach;
			return '<strong>'. esc_html($count).'</strong> / '.$post_qry->post_count.'';
		endif;

	}
endif;


/* Gallery post images
/******************************/
if ( !function_exists( 'ckav_gallery_post_images' ) ) :
	function ckav_gallery_post_images() {
		
		$gallery = get_post_gallery_images( get_the_ID() );
		$gallery_list = '';

		if (!empty($gallery)) {
			foreach ($gallery as $img) {
				$gallery_list .= '
				<div class="item">
					<div class="w100 bg-cc bg-cover pos-rel overflow-hidden" data-bg="'. esc_url($img) .'"><img class="op-0" src="'. esc_url($img) .'"></div>
				</div><!-- /.item -->';
			}
			return $gallery_list;
		} else {
			return false;
		}
	}
endif;


/* Related posts return
/******************************/
if ( !function_exists( 'ckav_related_posts' ) ) :
	function ckav_related_posts()
	{
		$categories = array();
		foreach( get_the_category( get_the_ID() ) as $category ) :
			$categories[] = $category->term_id;
		endforeach;

		$args = array(
			'post__not_in' => array( get_the_ID() ),
			'posts_per_page' => 6,
			'ignore_sticky_posts' => 1,
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $categories,
					'operator' => 'IN',
				),
				array(
					 'taxonomy' => 'post_format',
					 'field' => 'slug',
					 'terms' => array( 'post-format-quote', 'post-format-link' ),
					 'operator' => 'NOT IN'
				 )
			),
			'orderby' => 'rand'
		);
		$related_posts = new WP_Query( $args );

		if( $related_posts->post_count < 3 ) :
			$args = array(
				'post__not_in' => array( get_the_ID() ),
				'posts_per_page' => 3,
				'ignore_sticky_posts' => 1,
				'orderby' => 'rand'
			);
			return $related_posts = new WP_Query( $args );
		else:
			return $related_posts;
		endif;
	}
endif;


/* Portfolio category
/******************************/
if ( !function_exists( 'ckav_portitem_cat' ) ) :
	function ckav_portitem_cat( $type = 'filter' ) {
		$port_cat_obj = wp_get_object_terms(get_the_ID(), 'portfolio_cat');
		$port_cats = array();
		$port_cat_str = '';
		if (!empty($port_cat_obj)) {
			foreach ($port_cat_obj as $cat) {
				if ($type === 'filter') {
					$port_cats[] = $cat->slug;
				}
				if ($type === 'name') {
					$port_cats[] = $cat->name;
				}
			}
			if ($type === 'filter') {
				$port_cat_str = implode(' ', $port_cats);
			}
			if ($type === 'name') {
				$port_cat_str = implode('<span class="sep">-</span>', $port_cats);
			}
			
		}
		return $port_cat_str;
	}
endif;

/* Info sidebar data 
/*********************************/
if ( !function_exists( 'ckav_infodata' ) ) :
	function ckav_infodata() {
		
		$info_title = ckav_theme_option( 'customizer', 'info-title' );
		$info_subtitle = ckav_theme_option( 'customizer', 'info-subtitle' );
		$info_data = ckav_theme_option( 'customizer', 'info-section' );

		if ( !empty($info_title) ) {
			echo '<h2 class="content-title">' . esc_html( $info_title ) . '</h2>';
		}

		if ( !empty($info_subtitle) ) {
			echo '<p>' . esc_html( $info_subtitle ) . '</p>';
		}

		if ( !empty(ckav_social_profile()) ) {
			echo '<p class="social-profile">' . ckav_social_profile("sq20 iconbox") . '</p>';
		}

		if ( !empty($info_data) ) {
			foreach ($info_data as $v) {
				echo '<div class="row gt10">';
				if (ckav_getkey('icon/icon-type', $v) === "font-icon") {
					echo '<div class="col-auto"><span class="sq30 iconbox"><i class="'.ckav_getkey('icon/font-icon/icon', $v).'"></i></span></div>';
				}
				if (ckav_getkey('icon/icon-type', $v) === "custom-icon") {
					if ( !empty(ckav_getkey('icon/custom-icon/img', $v)) ) {
						echo '<div class="col-auto"><span class="sq30 iconbox"><img src="'.ckav_imgresize( ckav_getkey('icon/custom-icon/img/url', $v), 100 ).'" alt="'. esc_html__( "Icon", "flox" ) .'" /></span></div>';
					}
				}
				if ( !empty(ckav_getkey('desc', $v)) ) {
					echo '<div class="col">'. ckav_getkey('desc', $v) .'</div>';
				}
				echo '</div>';
			}
		}
	}
endif;

/**
 * Background tags
 ******************************/
if ( !function_exists( 'ckav_bgholder_data' ) ) :
	function ckav_bgholder_data( $arr=array() ) {
		$bgsettings = array();
		if ( !empty($arr) ) {
			if ( !empty(ckav_getkey('multi-bgcolor', $arr)) ) {
				$bgsettings[] = ckav_getkey('multi-bgcolor', $arr);
			}
			if ( !empty(ckav_getkey('multi-bggradient', $arr)) ) {
				$bgsettings[] = ckav_getkey('multi-bggradient', $arr);
			}
			if ( !empty(ckav_getkey('multi-bgimage', $arr)) ) {
				$bgsettings[] = ckav_getkey('multi-bgimage', $arr);
			}
			if ( !empty(ckav_getkey('multi-bgvideo', $arr)) ) {
				$bgsettings[] = ckav_getkey('multi-bgvideo', $arr);
			}
			if ( !empty(ckav_getkey('multi-particle', $arr)) ) {
				$bgsettings[] = ckav_getkey('multi-particle', $arr);
			}
			return !empty($bgsettings) ? $bgsettings : false;
		} else {
			return false;
		}
	}
endif;

if ( !function_exists( 'ckav_bgholder' ) ) :
	function ckav_bgholder( $arr, $default=array() ) {
		
		$html = '';
		if ( !empty($arr) ) {

			$html .= '<div class="bg-holder full-wh z0">';
			
			foreach ($arr as $v) {

				// Background overlay color
				if ( isset($v['overlay_status']) && $v['overlay_status'] == 'yes' ) {
				$html .= '	<b data-bgholder="overlay" class="full-wh z6" data-bgcolor="' . esc_attr($v['yes']['bgcolor']) . '"></b>';
				}

				// Gradient color
				if ( isset($v['gradient_status']) && $v['gradient_status'] == 'yes' ) {
					$gr_arr = array();
					$gr_arr[0] = $v['yes']['gr_angle'] != '' ? $v['yes']['gr_angle'].'deg' : '90deg';
					$gr_arr[1] = $v['yes']['gr_color1'] != '' ? $v['yes']['gr_color1'].' 0%' : 'rgba(0,0,0,0) 0%';
					$gr_arr[2] = $v['yes']['gr_color2'] != '' ? $v['yes']['gr_color2'].' 50%' : 'rgba(0,0,0,0) 50%';
					$gr_arr[3] = $v['yes']['gr_color3'] != '' ? $v['yes']['gr_color3'].' 100%' : 'rgba(0,0,0,0) 100%';
					$gr_str = implode(',', $gr_arr);

					$gr_style = 'background: '.$gr_arr[1].';
					background: linear-gradient('.$gr_str.');';

				$html .= '	<b data-bgholder="gradient" class="full-wh z5" style="'.esc_attr($gr_style).'"></b>';
				}

				// Particle effects
				if ( isset($v['particle_status']) && $v['particle_status'] == 'yes' ) {
				$html .= '	<div class="full-wh z6"><div id="particles-js-'.uid().'" class="particles-pane"></div></div>';
				wp_enqueue_style('ckav-particle-css', THEME_ASSETS . "js/partical-animation.css", array(), '1.0');
				wp_enqueue_script( 'ckav-particle1', THEME_ASSETS . "js/particle-animation/particles.min.js", array(), "1.0", true);
				wp_enqueue_script( 'ckav-particle2', THEME_ASSETS . "js/particle-animation/partical-animation.js", array(), "1.0", true);
				}

				// Background video
				if ( isset($v['bgvideo']) && $v['bgvideo'] == 'youtube' ) {
					$yt_url = $v['youtube']['yt_url'] != '' ? $v['youtube']['yt_url'] : false;
					if ($yt_url) {
						$html .= '	<div data-bgholder="videobg" class="full-wh z4 videobg-hold" data-videoid="'.esc_attr($yt_url).'"></div>';
						wp_enqueue_script( 'ckav-videobg', THEME_ASSETS . "js/youtubebackground/jquery.youtubebackground.js", array(), "1.0", true);
					}
				}

				// HTML video background
				if ( isset($v['bgvideo']) && $v['bgvideo'] == 'html' ) {

					$video_path = ckav_getkey('html/video_url', $v);
					
					if ( !empty($video_path) ) {
						$temp = explode('.', $video_path[0]['url']);
						$ext  = array_pop($temp);
						$video_name = implode('.', $temp);

						$html .= '<div data-bgholder="videobg" class="full-wh z0"><div class="full-wh vide-widget" data-vide-src="' . esc_attr($video_name) . '"></div></div>';
					}
				}

				// Background slider
				if ( isset($v['bgtype']) && $v['bgtype'] == 'bgslider' ) {
					$bgslides = ckav_getkey('bgslider/slide_images', $v);
					$bgslides_arr = array();
					$bgslides_str = '';
					if (!empty($bgslides)) {
						foreach ($bgslides as $slide) {
							$bgslides_arr[] = $slide['url'];
						}
						if (!empty($bgslides_arr)) {
							$bgslides_str = implode('|', $bgslides_arr);
						}

						$html .= '	<div data-bgholder="slider" class="full-wh z3"><div class="bgslider full-wh" data-bgslider="' . esc_attr($bgslides_str) . '"></div></div>';
					}
				}

				// Background image
				if ( isset($v['bgtype']) && $v['bgtype'] == 'bgimg' ) {
					$bgimg = ckav_getkey('bgimg/image/url', $v);
					$bgclasses = array(
						'full-wh', 'z2',
						ckav_getkey('bgimg/bg_fixed', $v) != '' && ckav_getkey('bgimg/bg_fixed', $v) == 'yes' ? 'bg-fixed' : '',
						ckav_getkey('bgimg/bgalign', $v) != '' ? ckav_getkey('bgimg/bgalign', $v) : 'bg-cc',
						ckav_getkey('bgimg/bgrepeat', $v) != '' ? ckav_getkey('bgimg/bgrepeat', $v) : '',
						ckav_getkey('bgimg/bgsize', $v) != '' ? ckav_getkey('bgimg/bgsize', $v) : 'bg-cover',
					);
					$bgimg = ckav_getkey('bgimg/image/url', $v);
					$bgclasses = array_filter($bgclasses);

					if ( $bgimg != '' ) {
						$html .= '	<b data-bgholder="bg-img" data-bg="'.esc_url($bgimg).'" class="'.esc_attr(implode( ' ', $bgclasses )).'"></b>';
					}
				}

			}
			$html .= '</div>';

		}

		return $html;
	}
endif;
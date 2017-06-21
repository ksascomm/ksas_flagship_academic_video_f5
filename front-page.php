<?php
/*
Template Name: Home - Background Video Modernizer
*/
?>
<?php get_header(); 
    $theme_option = flagship_sub_get_global_options();
		$news_query_cond = $theme_option['flagship_sub_news_query_cond'];
			if ( false === ( $news_query = get_transient( 'news_mainpage_query' ) ) ) {
				if ($news_query_cond === 1) {
					$news_query = new WP_Query(array(
						'post_type' => 'post',
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => array( 'books' ),
								'operator' => 'NOT IN'
							)
						),
						'posts_per_page' => 4)); 
				} else {
					$news_query = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => 4)); 
				}
			set_transient( 'news_mainpage_query', $news_query, 2592000 );
			} 	

?>

<!-- Begin main content area -->


<?php if (!is_handheld()) : ?> 

	<div class="fullscreen-bg">
	    <video loop muted autoplay poster="http://krieger2.jhu.edu/film-media/fms.jpg" class="fullscreen-bg__video">
	        <source src="http://krieger2.jhu.edu/film-media/fms.webm" type="video/webm">
	        <source src="http://krieger2.jhu.edu/film-media/fms.mp4" type="video/mp4">
	        <source src="http://krieger2.jhu.edu/film-media/fms.ogv" type="video/ogg">
	    </video>
	</div>


<?php endif; ?>

<main class="row wrapper radius10" id="page" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">	
	<div class="small-12 columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
        <?php endwhile; endif; ?>
	</div>
	<div class="small-12 large-8 columns">
	<h4><?php echo $theme_option['flagship_sub_feed_name']; ?></h4>
	    <?php if ( $news_query->have_posts() ) : ?>
	        <div class="row">
	           <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
	                <div class="small-12 columns post-container">
	                    <div class="row">
	                        <article class="small-11 small-centered columns post post-container news-item" aria-labelledby="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
        	                    <?php if(has_post_thumbnail()) { ?>
        	                        <div class="row">
        	                            <div class="small-12 columns">
        	                                <?php the_post_thumbnail('rss', array('itemprop' => 'image')); ?>
        	                            </div>
        	                        </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="small-12 columns">
                                        <h1 itemprop="headline">
                                        	<a href="<?php the_permalink();?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
                                        </h1>
                                        <meta name="dateModified" itemprop="dateModified" content="<?php the_modified_date(); ?>" />
                                        <div class="entry-content" itemprop="text">	
                                       		<?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
	                        </article>
	                    </div>
	                </div>
	           <?php endwhile; ?>
	        </div>
	        <div class="row">
			   <h5>
			   	<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
			   		View All <?php echo $theme_option['flagship_sub_feed_name']; ?>
			   	</a>
			  </h5>
			</div>
		<?php endif; ?>
	</div>

	<?php locate_template('parts/sidebar.php', true, false); ?>
</main>
<?php get_footer(); ?>

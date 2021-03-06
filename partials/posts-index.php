
<div class="all-posts">
	<div class="container">
		<div class="row">
			<div class="col s12 l8">
				<?php if ( have_posts() ) : ?>
					<?php $post = $posts[0]; $c=0;?>
						<div class="row">
							<?php while (have_posts()): the_post() ?>
								<?php $c++;
								if( !$paged && $c == 1) :?>
								  	<div class="col s12 l12">
								  		<div class="card">
										    <div class="card-image post-card">
												<?php
													// Output the featured image.
													if ( has_post_thumbnail() ) :
														?>
														<div class="index-thumbnails" style="background-image: url(<?php
															$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $feat_image;?>);">
															<div class="tint"></div>
															<div class="title">
																<h5 class="white-text"><a class="white-text" href="<?php the_permalink(); ?> ">  <?php the_title(); ?></a></h5>
																<p class="date"><?php echo the_date('d F Y', false); ?></p>
															</div>
														</div>
														
													<?php else: ?>
														<div class="noimage-content">
															<h5 class=""><a class="grey-text text-darken-4" href="<?php the_permalink(); ?> ">  <?php the_title(); ?></a></h5>
															<p class="date"><?php echo the_date('d F Y', false); ?></p>
															<?php the_excerpt(); ?>
														</div>
													<?php endif; ?>
										    </div>
										    <div class="card-content row valign-wrapper">
										    	 <a class="btn-floating btn-large waves-effect waves-light yellow lighten-1">
										    	 <span class="fb-comments-count" data-href="<?php the_permalink(); ?> "></span><i class="fa fa-commenting-o" aria-hidden="true"></i></a>
											    <div class="col s4 m2">
									                <?php echo get_avatar( get_the_author_meta('ID'), 60); ?>
									            </div>
									            <div class="col s8 m10">
									                <p><?php echo get_the_author(); ?></p>
									                <?php the_category(', '); ?>
									            </div>
										    </div>
										  </div>
								  	</div>
								<?php endif;?>
							<?php endwhile; ?>

							<?php $args = array('offset' => 1, 'posts_per_page' => 5 );
							$loop = new WP_Query( $args ); ?>
								<div class="col s12 l12">
								  	<div class="row">
								  		<div class="col s12 l12">
									  		<ul class="collection">
												<?php while ($loop->have_posts()): $loop->the_post() ?>
											  		<li class="collection-item avatar">
														<?php
															// Output the featured image.
														if ( has_post_thumbnail() ) :
														$feat_image = get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>
															<img src="<?php echo $feat_image;?>" alt="" class="circle">
														<?php else: ?>
															<img alt="" class="noimage-content circle responsive-img">
														<?php endif; ?>
														<span class="title">
														    <a class="black-text" href="<?php the_permalink(); ?> ">  <?php the_title(); ?></a>
														</span>
														<p class="date"><?php echo the_date('d F Y', false); ?></p>
														<a href="#!" class="secondary-content"><i class="material-icons">whatshot</i></a>
													</li>
												<?php endwhile; ?>
											</ul>
									  	</div>
								  	</div>
								</div>
						</div>
					
				<?php else : ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</div>
			<div class="col s12 l4">
				<?php 
				//create widget insert

				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('polling-widget') ) : 
				endif; ?>
			</div>
		</div>
	</div>
</div>
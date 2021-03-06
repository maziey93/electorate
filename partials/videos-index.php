<div class="videos">
		<div class="container">
			<h1 class="section-heading">Videos <span class="highlight"></span></h1>
			<div class="row">
				<?php
					$args = array( 'post_type' => 'video', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					while ($loop->have_posts()): $loop->the_post() ?>
					  	<div class="col s12 l3">
					  		<div class="card">
							    <div class="card-image video-card center">
							    	<div class="play">
							    		<i class="fa fa-play-circle fa-4x"></i>
							    	</div>
									<?php
										// Output the featured image.
										if ( has_post_thumbnail() ) :
											?>
											<div class="index-thumbnails" style="background-image: url(<?php
												$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $feat_image;?>);">
												<div class="tint"></div>
											</div>
											
											<?php 
											
										else: ?>
											<div class="noimage-content">
												<h5 class=""><a class="grey-text text-darken-4" href="<?php the_permalink(); ?> ">  <?php the_title(); ?></a></h5>
												<p class="date"><?php echo the_date('d F Y', false); ?></p>
												<?php the_excerpt(); ?>
											</div>
									<?php
										endif;
									?>
							    </div>
							    <div class="card-content row valign-wrapper">
							    	 <a class="btn-floating btn-large waves-effect waves-light yellow lighten-1">
							    	 <span class="fb-comments-count" data-href="<?php the_permalink(); ?> "></span><i class="fa fa-commenting-o" aria-hidden="true"></i></a>
						            <div class="col s12 m12">
						                <div class="title">
											<a class="black-text" href="<?php the_permalink(); ?> ">  <?php the_title(); ?></a>
											<p class="date black-text"><?php echo the_date('d F Y', false); ?></p>
										</div>
						            </div>
							    </div>
							  </div>
					  	</div>
					<?php endwhile; ?>
			</div>
		</div>
	</div>
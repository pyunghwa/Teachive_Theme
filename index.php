<?php get_header(); ?> 


              <ul class="mcol">
              <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
              	<li class="article">
                
                    	<?php
						// Exist post thumbnail
                    	if ( has_post_thumbnail() ) { ?>
                    	<?php 
							$imgsrcparam = array(
							'alt'	=> trim(strip_tags( $post->post_excerpt )),
							'title'	=> trim(strip_tags( $post->post_title )),
							);
							$thumbID = get_the_post_thumbnail( $post->ID, 'background', $imgsrcparam ); ?>
							<div><a href="<?php the_permalink() ?>" class="preview"><?php echo "$thumbID"; ?></a></div>
                    	<?php }
						
						else {
							$thumbID = get_post_meta( $post->ID, 'featureimage', true ); 
							
							// Exist feature image from curation
							if ($thumbID != null) { ?>
								<div><a href="<?php the_permalink() ?>" class="preview">
								<img class="preview_img" src="<?php echo "$thumbID"; ?>" alt="<?php echo trim(strip_tags( $post->post_excerpt )); ?>" title="<?php trim(strip_tags( $post->post_title )); ?>" /></a></div>

							<?php 
							// Neither post thumbnail nor feature image
							} else { ?>
								<div><a href="<?php the_permalink() ?>" class="preview">
								<img class="preview_img" src="http://teachive.org/wp-teachersarchive/wp-content/uploads/2012/09/teachive_logo.png" alt="<?php echo trim(strip_tags( $post->post_excerpt )); ?>" title="<?php trim(strip_tags( $post->post_title )); ?>" /></a></div>
							<?php
							}
						} ?>
                
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
						<?php the_excerpt(); ?>
						
						<div id="feature_text">
						<?php 
							// feature text
							$featureText = get_post_meta( $post->ID, 'featuretext', true ); 
							if($featureText != null) {?>
								<b>*Comment : </b>
								<?php echo $featureText; 
							}?>
							
						<?php
							// feature url
							$feature_url = get_post_meta( $post->ID, 'featureurl', true ); 
							if($feature_url != null) {?>
									<br /><b>*Link : </b>
									<a href="<?php echo $feature_url ?>"><?php echo $feature_url ?></a>
						<?php
							} ?>
						</div>
							
                    <div class="postmetadata">
                        Posted: <?php the_time(__('Y-m-d', 'kubrick')) ?>&nbsp;&#721;&nbsp;
                        <?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), '', __('Comments Closed') ); ?><br />
                        <?php printf(__('Classes: %s'), get_the_category_list(', ')); ?>
                    </div>
                </li>
            <?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>
            </ul>
        
            <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
            <?php endwhile; ?>
            <?php else : ?>
            <div id="main">
                <h1><?php _e("Sorry, but you are looking for something that isn&#8217;t here."); ?></h1>
            </div>
            <?php endif; ?>

        
            <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
            <?php endwhile; ?>
                <div id="nav">
                    <div id="navleft"><?php next_posts_link(__('Previous page&nbsp;')) ?></div>
                    <div id="navright"><?php previous_posts_link(__('Next page&nbsp;')) ?></div>
                </div>
            <?php else : ?>
            <?php endif; ?>
        

        
        
        
<?php get_footer(); ?>

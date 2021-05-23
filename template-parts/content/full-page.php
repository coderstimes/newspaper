<div class="col-md-8">

   <?php 
      $img_size = wp_is_mobile() ? 'medium_large' : 'full';
      if (have_posts()) : 
         while (have_posts()) : 
            the_post();
            setPostViews(get_the_ID()); 
   ?>
   
   <div class="col-middle p-10">
      <div class="single-post-content">
         <div class="title-holder m-b-20">
            <h1 class="title m-b-20"> <?php the_title(); ?> </h1>
         </div>
         <div class="m-top-meta">
            <div class="col-sm-7 p-l-0">
               <div class="item">
                  <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo date('d F, Y | m:s a', get_post_time()); ?></time>
               </div>
               <div class="item">
                  <div class="author_name">
                     <a href="<?php echo  esc_url( get_author_posts_url( $post_author_id ) ); ?>" title="<?php echo  esc_attr( $author ); ?>"><?php echo ucwords($author); ?></a>
                  </div>
               </div>
            </div>
            <div class="col-sm-5 no-padding">
               <div class="item addthis-share">
                  <div class="addthis_inline_share_toolbox"></div>
               </div>
            </div>
         </div>
         <figure class="img-holder">
            <img class="img-responsive rounded mx-auto d-block" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $img_size); ?>" alt="<?php the_title(); ?>">
            <?php if( $img_caption = get_the_post_thumbnail_caption() ) : ?>
               <p class="img-caption img-layer-thumb m-b-0"> 
                  <?php echo $img_caption; ?>
               </p>
            <?php endif; ?>
         </figure>

         <div class="content_area">
            <?php the_content(); ?>
         </div>
         
         <div class="post-tags-alt u-margin-t-20" style="display:block">
            <?php $tags=get_the_tags(); if($tags): ?>
               <div class="tags-wrap">
                  <i class="fa fa-tags" style="font-size:1.3em"></i>
                  <?php foreach($tags as $tag): ?>
                     <a class="cat-world" href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo ucwords($tag->slug);?></a>
                  <?php endforeach; ?>
               </div>
            <?php endif; ?>
         </div>
         
      </div>                  
   </div>
   <?php endwhile; endif; ?>
   
</div>


<div class="col-md-4">
   <?php get_template_part( 'template-parts/sidebar/latest', 'popular' ); ?>
</div>
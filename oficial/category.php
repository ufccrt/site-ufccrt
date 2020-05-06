<?php get_header(); ?>
<div class="py-5">
  <div class="container layout_centro">
    <div class="row sombraDivs">
      <div class="col-md-3 sombraDivMenuEsquerdo EspacamentoTopoMenuLateral">              
        <div id="sidebar-primary" class="nav-link">
            <?php dynamic_sidebar( 'menu_lado' ); ?>
        </div>
      </div>      
      <div class="col-md-9">
        <ul class="nav nav-pills flex-column pi-draggable comBordaTracos" draggable="true">
          <li class="nav-link">
            <a class="nav-link DiminuirrecuoEsquerda" href="#">
              <!--<i class="fa fa-home fa-home"></i> --><strong><h4 class="widget-title"><?php single_cat_title(); ?></h4></strong></a>
          </li>

        </ul>

        <?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
 
        <?php rewind_posts(); ?>                     
 
        <?php while ( have_posts() ) : the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('PesquisaResultadoPostAutorData'); ?>>

		  <div class="entry-separador"></div>

          <div class="entry-meta">
          	<strong>
          		<?php 
          
                  the_time('j');
                  echo '<br>';
          
                  the_time('M');  
          
                ?>
          
             <?php //edit_post_link( __( 'Edit', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
          	</strong>
          </div>


          <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
 

                                        

 
                                        <div class="entry-summary">
<?php //the_excerpt( __( 'Continue lendo... <span class="meta-nav">»</span>', 'your-theme' )  ); ?>
<?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                                        </div><!-- .entry-summary -->
 
                                        <div class="entry-utility">

                                                <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'your-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
                                                <?php edit_post_link( __( 'Edit', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
                                        </div><!-- #entry-utility -->
                                </div><!-- #post-<?php the_ID(); ?> -->
 
<?php endwhile; ?>                      
 
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { 
  
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  $custom_args = array(
      'post_type' => 'post',
      'posts_per_page' => 2,
      'paged' => $paged
    );

  $custom_query = new WP_Query( $custom_args );
  
  ?>
 
                                
 <div id="nav-below" class="navigation">
  <?php
      if (function_exists(custom_pagination())) {
        custom_pagination($custom_query->max_num_pages,"",$paged);
      }
    ?>
  </div><!-- #nav-below -->
<?php } ?>
</div><!-- #content -->
</div><!-- #container -->
</div>
</div>


<?php get_footer(); ?>


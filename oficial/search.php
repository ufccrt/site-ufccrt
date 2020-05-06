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
              <!--<i class="fa fa-home fa-home"></i> --><strong><h4 class="widget-title">Resultado da Busca</h4></strong></a>
          </li>
        </ul>
                         
    
    <div class="td-menor">
		<table class="table table-hover table-sm table-bordered table-striped">
			<tr class="active">
				<th>Título da postagem</th>
				<th style="text-align: center;">Data</th>
			</tr>	
      <?php while ( have_posts() ) : the_post() ?>
            <tr>
            	<td>
                	<div id="post-<?php the_ID(); ?>" <?php post_class('PesquisaResultadoNovoModelo'); ?>>
                		<span class="titulo_pesquisa">
                			<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
                				<?php the_title(); ?>
                			</a>
                		</span>
                	</div>
                	
                	
                	<?php if ( $post->post_type == 'post' ) { ?>
          			<div class="entry-utility">
            			<span class="cat-links">
            				<span class="entry-utility-prep entry-utility-prep-cat-links">
            					<?php //_e( '', 'your-theme' ); ?>
            				</span>
            				<span class="tag_postagem">
            					<?php echo get_the_category_list(', '); ?>
            				</span>
            			</span>
            			<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'your-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
            			<?php edit_post_link( __( 'Atualizar', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
          				</div><!-- #entry-utility -->
        			<?php } ?>
                	
            	</td>
            	<td>
            	    <?php if ( $post->post_type == 'post' ) { ?>
          			<div class="detalhe_pesquisa">
            			<span class="meta-prep meta-prep-author"><?php //_e('Autor ', 'your-theme'); ?></span>
            			<span class="author vcard"><a class="url fn n" href="<?php //echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php //printf( __( 'View all posts by %s', 'your-theme' ), $authordata->display_name ); ?>"><?php //the_author                                    (); ?></a></span>
            			<!-- <span class="meta-sep">  </span> -->
            			<span class="meta-prep meta-prep-entry-date"><?php //_e('Publicado em ', 'your-theme'); ?></span>
            			<span class="entry-date"><?php the_time('d/m/Y'); ?></span>
            		<?php //edit_post_link( __( 'Editar', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
          			</div>
          			<!-- .entry-meta -->
        			<?php } ?>
            	</td>
            </tr>
        
    
        
 

        <div class="entry-summary">
          <?php //the_excerpt( __( 'Leia mais... <span class="meta-nav">»</span>', 'your-theme' )  ); ?>
          <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
        </div><!-- .entry-summary -->

        
        
 
      <?php endwhile; ?>
      
      	</table>
	</div>
      
      
      <?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
        <div id="nav-below" class="navigation">
          <div class="nav-next"><?php next_posts_link(__( '<span class="meta-nav">Próximos »</span>', 'your-theme' )) ?></div>
          <div class="nav-previous"><?php previous_posts_link(__( '<span class="meta-nav">« Anterior</span> ', 'your-theme' )) ?></div>
          
        </div><!-- #nav-below -->
      <?php } ?>                      
                     
              <div class="espacamentoNormal"></div>
            </div>
          </div>
      </div>
</div>
              
<!-- ***********************************************************-->
</div>
</div>
</div>
<?php get_footer(); ?>

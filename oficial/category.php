<?php get_header(); ?>

<div class="container ">
    <div class="row">
		<div class="col-md-9" style="min-height: 500px;">
			<div class="topo-busca">
			<h4 class="widget-title"><span>Ver tudo em:</span> <?php single_cat_title(); ?></h4></a>
			</div>
			
						
			<?php
			
			while ( have_posts() ) : the_post() ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class('PesquisaResultadoNovoModelo'); ?> class="col-md-12">
											<?php if ( $post->post_type == 'post' ) { ?>
												<span class="entry-date"><?php the_time('d/m/Y'); ?></span>
											<?php } ?>
									<div class="titulo_pesquisa col-md-12" >
											<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
												<span><?php the_title(); ?> </span> 
                      </a>
                      <P><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></P> 
									</div>
									<div class="col-md-12 tags-resultados-buscas">
											
											<span class="tag_postagem">
													<?php echo get_the_category_list(', '); ?>
											</span>
											
									</div>
									
								
								
								<div class="entry-summary">
									<?php //the_excerpt( __( 'Leia mais... <span class="meta-nav">»</span>', 'your-theme' )  ); ?>
									<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
								</div><!-- .entry-summary -->
							</div>
							
			<?php
			
			endwhile;

			?>

			<?php
					$ver=have_posts();
					$p=$ver;
					if($p===true){
						echo "<p>Fim dos resultados.</p>";
					}else{
						echo "<p>Não há conteúdo nessa categoria";
					};
			?>
			
			
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				<div id="nav-below" class="navigation">
				<div class="nav-next"><?php next_posts_link(__( '<span class="meta-nav">Próximos »</span>', 'your-theme' )) ?></div>
				<div class="nav-previous"><?php previous_posts_link(__( '<span class="meta-nav">« Anterior</span> ', 'your-theme' )) ?></div>
				
			<?php } ?>
		</div>

	</div>
	<div class="col-md-3 barra-lateral-direita">
				<?php include_once 'views/sessoes-home/acessorapido.php'; ?>
		</div>
</div>

<?php get_footer(); ?>

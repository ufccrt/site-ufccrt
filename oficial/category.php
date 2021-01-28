<?php get_header(); ?>

<!-- inicio do container category -->
<div class="container ">
	
	<!-- inicio row -->
    <div class="row">
	
		<!-- inicio da coluna dos resultados -->
		<div class="col-md-9" style="min-height: 500px;">

			<!-- inicio topo busca -->
			<div class="topo-busca">
			
				<!-- inicio do titulo do widget -->
				<h4 class="widget-title">
					<span>Ver tudo em:</span> 
					<?php single_cat_title(); ?>
				</h4> 
				<!-- final do titulo do widget -->

				<!-- ver melhor o motivo desse link    </a> -->
			
			</div>
			<!-- final topo busca -->
						
			<?php
				while ( have_posts() ) : the_post() 
			?>
				<!-- início dos posts -->
				<div id="post-<?php the_ID(); ?>" <?php post_class('PesquisaResultadoNovoModelo'); ?> class="col-md-12">
						
					<!-- inicio da verificacao se é post -->
					<?php 
						if ( $post->post_type == 'post' ) { 
					?>
						<span class="entry-date"><?php the_time('d/m/Y'); ?></span>
					<?php 
						}
					?>
					<!-- final da verificacao se é post -->
						
					<!-- inicio título da pesquisa -->
					<div class="titulo_pesquisa col-md-12" >
						<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
							<span><?php the_title(); ?> </span> 
						</a>
						<p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
					</div>
					<!-- final titulo e conteudo resumido da pesquisa -->


					<!-- inicio das tags de resultados de buscas -->
					<div class="col-md-12 tags-resultados-buscas">
						<span class="tag_postagem">
							<?php echo get_the_category_list(', '); ?>
						</span>
					</div>
					<!-- final das tags de resultados de buscas -->
						
					<!-- inicio entry-summary -->
					<div class="entry-summary">
						<?php //the_excerpt( __( 'Leia mais... <span class="meta-nav">»</span>', 'your-theme' )  ); ?>
						<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
					</div>
					<!-- final entry-summary -->
				
				</div>
				<!-- início dos posts -->
			<?php
				endwhile;
			?>

			<?php
				// variáveis importantes
				global $wp_query; 
				$total_pages = $wp_query->max_num_pages; 
				$current_page = get_query_var('paged');

				// exibindo informação sobre total de posts 
				$ver=have_posts();
				$p=$ver;
				if($p==true){
					if($current_page == $total_pages){
						echo "<p>Fim dos resultados.</p>";
					}
				}else{
					echo "<p>Não há conteúdo nessa categoria</p>";
				};

				
			?>
			
			
			<?php
				// paginação 
				if ( $total_pages > 1 ) { 
			?>
					<div id="nav-below" class="navigation">
						<div>
							<?php next_posts_link(__( '<p>Próximo</p>', 'your-theme' )) ?>
						</div>
						<div>
							<?php previous_posts_link(__( '<p>Anterior</p> ', 'your-theme' )) ?>
						</div>
					</div>
			<?php 
				} // final da paginação 
			?>
		</div>
		<!-- final da coluna dos resultados -->

		<!-- inicio da barra de acesso rápido -->
		<div class="col-md-3 barra-lateral-direita">
			<?php 
				include_once 'views/sessoes-home/acessorapido.php'; 
			?>
		</div>
		<!-- final da barra de acesso rápido -->

	</div>
	<!-- final row -->


</div>
<!-- final do container category -->

<?php get_footer(); ?>

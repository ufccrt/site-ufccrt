<?php get_header(); ?>

<div class="container ">

<div class="row">

<div class="col-md-9" style="min-height: 500px;">


<div class="topo-busca">
	<h4 class="widget-title">Resultado da Busca<span></h4>
		Para: </br>
		<span>
			<?php
			$termoPesquisado = get_search_query();
				if ($termoPesquisado!=""){
					echo $termoPesquisado;
					 
				}else {
					echo "Digite o que você procura no campo de busca, no topo da págiana";
				}
			?>
		</span>
		
</div>
	
				
	<?php
		while ( have_posts() ) : the_post() 
	?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('PesquisaResultadoNovoModelo'); ?> class="col-md-12">

									<?php 
										if ( $post->post_type == 'post' ) { 
									?>

										<span class="entry-date"><?php the_time('d/m/Y'); ?></span>

									<?php 
										} 
									?>

							<div class="titulo_pesquisa col-md-12" >

									<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
										<span><?php the_title(); ?> </span> 
									</a>

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
			if(have_posts()===true){
				
				global $wp_query; 
				$total_pages = $wp_query->max_num_pages; 
				$current_page = max(1, get_query_var('paged'));

				$np = $current_page;

				if($np==$total_pages){
					echo "<p>Fim dos resultados.</p>";
				}

				if ( $total_pages > 1 ) { 
					
	?>

		<div id="nav-below" class="navigation">
			<div class="page">
				<p><?php next_posts_link(__( '<span id="spp" class="custom-control titulo_pesquisa meta-nav" style="float:right">Próximo</span>', 'your-theme' )) ?></p>
				<p><?php previous_posts_link(__( '<span id="spa" class="custom-control titulo_pesquisa meta-nav" style="float:left">Anterior</span> ', 'your-theme' )) ?></p>
			</div>

	<?php
		}

			}else{
				echo "<p>Não há resultados para sua busca. Tente outros termos no campo de busca <span class='iconePesquisaForm' style='width: 100px;height: 50;
				display: inline-block; position: relative;bottom: -27px;'></span>.</p>";
			};
	?>
	

</div>

		</div>

<div class="col-md-3 barra-lateral-direita">
		<?php include_once 'views/sessoes-home/acessorapido.php'; ?>
</div>

</div>

</div>

<?php get_footer(); ?>

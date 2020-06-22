<section id="demais-notícias" class="row container-fluid">
    <div class="container">
         <h4 class="titulos-blocos">Ultimas notícias</h4>
            <div class="noticia-recente">
                    <?php
                            global $post;
                            $args = array( 'numberposts' => 6, 'cat' => 16, true );
                            $myposts = get_posts( $args );
                            foreach( $myposts as $post ) : setup_postdata($post);?>
                              <div class="col-md-4 col-sm-6  col-12 float-left post-destaque">
                                <div class="post-destaque-conteudo">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="textos-post-destaque">
                                            <h5><?php echo resume(get_the_title(), 150); ?></h5>
                                            <span class="resumo-post-destaque">
                                            <?php echo resume(get_the_excerpt(),100); ?>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                              </div>
                            <?php endforeach;
                     ?>
                       

            </div>
        
    </div>
    <div class="container mais-notícia">
            <a href="<?php echo home_url( '/' ); ?>categoria/noticias/">Mais notícias <i class="fas fa-th-list"></i></a>
    </div>
</section>
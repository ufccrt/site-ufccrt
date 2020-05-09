<div class="container">
    <section class="noticia col-md-10">
        <article>
            <div class="dataAtuslizacao">Atualização: <strong><?php the_modified_date('d/m/Y'); ?></strong> às <strong><?php the_modified_date('H:i'); ?></strong></div>
            <h4 class="widget-title"><?php the_title(); ?></h4></strong>
            
                <?php 
                    // PAGINA NOTÍCIA (Post)
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                                the_post(); 
                                the_content();
                        } ;
                        
                    };
                ?>
            
         </article>
      </section>
</div>
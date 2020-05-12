<div class="container">
    <section class="noticia col-md-10">
        <article>
            <div class="dataAtuslizacao">Atualização: <strong><?php the_modified_date('d/m/Y'); ?></strong> às <strong><?php the_modified_date('H:i'); ?></strong></div>
            <h4 class="widget-title"><?php the_title(); ?></h4></strong>

            <?php 
                if(isPage()){
            ?>
            <div class="thumb-destaque" style="background-image: url(<?php print(getThumbnail($BIG))?>"></div>
            <?php 
                }
                viewPost();
            ?>
            
         </article>
      </section>
</div>
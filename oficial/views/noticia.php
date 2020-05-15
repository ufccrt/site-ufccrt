<?php if(isPage()){ ?>
            <div class="cntainer-fluid row">
                        
                        <div class="top-noticia" style="background-image: url(<?php print(getThumbnail($BIG))?>">
                             
                        </div>
                        <div class="container">
                                <div class="espaco-titulo">
                                    <h4 class=" widget-title"><?php the_title(); ?></h4>
                                </div> 
                             </div>
                        
            </div>
            <div class="container">
                <section class="noticia col-md-10">
                    <?php viewPost(); ?>
                </section>
            </div>
<?php }if (isPost()){?>
    <div class="container">
        <section class="noticia col-md-10">
            <article>
                <div class="dataAtuslizacao">Atualização: <strong><?php the_modified_date('d/m/Y'); ?></strong> às <strong><?php the_modified_date('H:i'); ?></strong></div>
                <h4 class="widget-title"><?php the_title(); ?></h4>
                
                <?php 
                    
                    viewPost();
                ?>
                
            </article>
        </section>
    </div>
<?php }?>


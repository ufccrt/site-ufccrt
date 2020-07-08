<?php if(isPage()){ ?>
            <div class="container-fluid row">
                        
                        <div class="top-noticia" style="background-image: url(<?php print(getThumbnail($BIG))?>">
                        </div>
                        
                        <div class="container">
                        
                                <div class="espaco-titulo">
                                <span style="font-size: 14px; color: initial;font-weight: 300;">Você está aqui:</span> <?php echo do_shortcode( '[flexy_breadcrumb]' ); ?>
                                    <h4 class=" widget-title"><?php the_title(); ?></h4>
                                    
                                    </div> 
                                    
                                    
                        </div>
                        
                        
            </div>
            <div class="container">
                <section class="noticia col-md-12">
                    
                    <?php viewPost(); ?>
                </section>
            </div>
<?php }if (isPost()){?>
    <div class="container">
        <section class="noticia conteudo-post col-md-10">
            <span style="font-size: 14px; color: initial;font-weight: 300;">Você está aqui:</span> <?php echo do_shortcode( '[flexy_breadcrumb]' ); ?>
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


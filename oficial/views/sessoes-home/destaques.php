<?php 

$SMALL = "300x300";

function getThumbnail($size){
    if(has_post_thumbnail()){
        $url = get_the_post_thumbnail_url(null, $size);

        if($url)
            return esc_url($url);
        else
            return "";
    }
    
}

function getThumbnails(){
    return the_post_thumbnail('thumb-post', array());
}

?>

<section id="destaques"class="container-fluid row">
    <div class="container">
    
        <div class="col-md-9 float-left">
            <div class="Postagens-destaques ">
                <!-- PARTE DA NOTICIA DESTAQUE - INICIO -->
                <div class="importante col-md-12">
                   <h4 class="titulos-blocos">Importante</h4>
                        <?php
                            global $post;
                            $args = array( 'numberposts' => 1, 'cat' => 7, true );
                            $myposts = get_posts( $args );
                            foreach( $myposts as $post ) : setup_postdata($post);?>
                              <div class="manchete-importante">
                                  <a href="<?php the_permalink(); ?>"><?php echo resume(get_the_title(), 150); ?></a>
                              </div>
                            <?php endforeach;
                        ?>
                    
                </div>
                <div class="blocos destaques col-md-12">
                   <h4 class="titulos-blocos">Destaques</h4>
                   <?php
                            global $post;
                            $args = array( 'numberposts' => 3, 'cat' => 5, true );
                            $myposts = get_posts( $args );
                            foreach( $myposts as $post ) : setup_postdata($post);?>
                              <div class="col-md-4 float-left post-destaque">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="thumb-destaque" style="background-image: url(<?php print(getThumbnail($SMALL))?>"></div>
                                    <div class="textos-post-destaque">
                                        <h5><?php echo resume(get_the_title(), 150); ?></h5>
                                        <span class="resumo-post-destaque">
                                           <?php echo resume(get_the_excerpt(),100); ?>
                                        </span>
                                    </div>
                                </a>
                              </div>
                            <?php endforeach;
                        ?>
                  
                  
                </div>

                <?php if (!empty($myposts)){ ?>

                <?php } ?>
            </div>
        </div>
        
        <!--BARRA LATERAL-->
        <div class="col-md-3 barra-lateral-direita float-left">
            <?php include_once 'acessorapido.php'; ?>
        </div>

    </div>
</section>
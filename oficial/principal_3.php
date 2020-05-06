<?php $PASTA_INICIAL="wp-content/themes/oficial/";?>


<div class="areaDestaquePostagens">
    <div class="zebrado">
        <span class="tituloBannerExtensao">NOTÍCIAS</span>
    </div>

    <!-- PARTE DA NOTICIA DESTAQUE - INICIO -->
    <div class="ParteBannerDestaquePrincipal">
    <div class="DestaquePrincipal">
     <?php
      global $post;
      $args = array( 'numberposts' => 1, 'cat' => 9, true );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ) : ?>
          <?php setup_postdata($post);?>
          <div class="BannerDestaque">
                       <?php if(has_post_thumbnail()){
                       the_post_thumbnail('thumb-post', array( )); }?>
              
          </div>
           
           <div class="resumoDestaqueBanner">
              <a href="<?php the_permalink(); ?>" ><span ><?php echo resume(get_the_title(), 150); ?></span> </a>
          </div>
           
      <?php endforeach; ?>  
    </div>
    </div>       
       <!-- PARTE DA NOTICIA SECUNDARIO - INICIO -->
       
       
     <?php
      global $post;
      $i = 0;
      $args = array( 'numberposts' => 5, 'cat' => 20 );
      $myposts = get_posts( $args ); ?>
      
      <!-- <div class="ParteBannerDestaqueSecundario"> -->
      
      <?php foreach( $myposts as $post ) : 
          //if ($i == 2){?>
             
             <!-- <div class="ParteBannerDestaqueSecundario"> -->
             
          <?php //} ?>
          <?php setup_postdata($post);?>
            <div class="DestaqueSecundarios">
              <div class="BannerSecundarios">
                       <?php if(has_post_thumbnail()){
                       the_post_thumbnail('thumb-post', array( )); }?>
              </div>
              <div class="resumoPequenosBanner">
                 <a href="<?php the_permalink(); ?>" ><?php echo resume(get_the_title(), 75); ?></a>
             </div>
            </div>
             <?php //if ($i == 1){ ?>
             
             <!-- </div> -->
             
             <?php //} 
             $i++; ?>
      <?php endforeach; ?>
        
        <!-- </div> -->
        
       <!-- PARTE DA NOTICIA SECUNDARIO 2 - INICIO -->
       
       
</div>
<?php if (!empty($myposts)){ ?>
<div class="MaisNoticiasDestaques"><a href="<?php echo home_url( '/' ); ?>categoria/noticia">Veja Mais</a></div>
<?php } ?>
        <!-- PARTE DA NOTICIA SECUNDARIO 2 - FIM -->        
        
<!-- <div class="divisoriaDestaques"></div> -->

<div class="areaPesquisaPostagens">
    <?php
     global $post;
     $args = array( 'numberposts' => 1, 'cat' => 23 );
     $myposts = get_posts( $args ); 
    if (!empty($myposts)){ ?>
    
    <div class="zebrado">
        <span class="tituloBannerExtensao">INSTITUCIONAL</span>
    </div>



    <div class="PesquisaPrincipal">
     
      <?php foreach( $myposts as $post ) :  setup_postdata($post);?>
         <div class="BannerPesquisa">
         <?php 
         
                if(has_post_thumbnail()){
                
                    the_post_thumbnail('thumb-post', array(  )); 

                }          
          ?>
          </div>
           
          <div class="resumoPesquisaBanner">
              <a href="<?php the_permalink(); ?>" ><span ><?php echo resume(get_the_title(), 150); ?></span> </a>
          </div>
           
      <?php endforeach; ?> 
     </div>
    
      <?php
      global $post;
      $i = 0;
      $args = array( 'numberposts' => 3, 'cat' => 24 );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ) : 
            setup_postdata($post);?>
            <div class="PesquisaSecundarios">
            <div class="BannerPesquisaSecundarios">
                       <?php if(has_post_thumbnail()){
                       the_post_thumbnail('thumb-post', array( )); }?>
            </div>
              <div class="resumoPequenosPesquisaBanner">
                 <a href="<?php the_permalink(); ?>" ><?php echo resume(get_the_title(), 71); ?></a>
             </div>
            </div>
      <?php endforeach; ?>
    <?php } //Fim container de Pesquisa?> 
</div>


<?php if (!empty($myposts)){ ?>
<div class="MaisNoticiasDestaques"><a href="<?php echo home_url( '/' ); ?>categoria/institucional/">Veja Mais</a></div><br>
<?php } ?>

  <!--  <div class="divisoriaDestaques"></div> -->
    
    <div class="zebrado">
        <span class="tituloBannerExtensao">GALERIA DE FOTOS</span>
    </div>

    <div id="galeriaAcademica" class="justified-gallery">
        
    <?php 
        $imgs = 17;

        for($x = 1; $x <= $imgs;$x++){

    ?>
 
    <a class="group1" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/imgs/gallery_inicial/<?php echo $x;?>.jpg" >
        <img alt="imagem <?php echo $x;?>" src="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/imgs/gallery_inicial/<?php echo $x;?>.jpg" />
    </a>

    
    <?php }?>
        
</div>


<!-- galeria de imagens abaixo -->
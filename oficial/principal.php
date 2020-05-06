<?php $PASTA_INICIAL="wp-content/themes/ufc/";?>


<div class="areaDestaquePostagens">
    <div class="zebrado">
        <span class="tituloBannerExtensao">NOTÍCIAS</span>
    </div>

    <!-- PARTE DA NOTICIA DESTAQUE - INICIO -->
    <div class="ParteBannerDestaquePrincipal">
    <div class="DestaquePrincipal">
     <?php
      global $post;
      $args = array( 'numberposts' => 1, 'cat' => 9 );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ) : ?>
          <?php setup_postdata($post);?>
          <div class="BannerDestaque">
                       <?php if(has_post_thumbnail()){
                       the_post_thumbnail('thumb-post', array( 'class' => 'img-thumbnail' )); }?>
              
          </div>
           
           <div class="resumoDestaqueBanner col-7 col-md-12  ">
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
      <div class="ParteBannerDestaqueSecundario">
      <?php foreach( $myposts as $post ) : 
          if ($i == 2){?>
             <div class="ParteBannerDestaqueSecundario2">
          <?php } ?>
          <?php setup_postdata($post);?>
            <div class="DestaqueSecundarios">
              <div class="BannerSecundarios">
                       <?php if(has_post_thumbnail()){
                       the_post_thumbnail('thumb-post', array( 'class' => 'img-thumbnail' )); }?>
              </div>
              <div class="resumoPequenosBanner">
                 <a href="<?php the_permalink(); ?>" ><?php echo resume(get_the_title(), 75); ?></a>
             </div>
            </div>
             <?php if ($i == 1){ ?>
             </div>
             <?php } 
             $i++; ?>
      <?php endforeach; ?>
        </div>
        
       <!-- PARTE DA NOTICIA SECUNDARIO 2 - INICIO -->
       
       
</div>

<div class="MaisNoticiasDestaques"><a href="<?php echo home_url( '/' ); ?>category/destaque/">Veja Mais</a></div>

        <!-- PARTE DA NOTICIA SECUNDARIO 2 - FIM -->        
        
<div class="divisoriaDestaques"></div>

<div class="areaPesquisaPostagens">
    <div class="zebrado">
        <span class="tituloBannerExtensao">PESQUISA</span>
    </div>



    <div class="col-md-12">
      <?php
      global $post;
      $args = array( 'numberposts' => 1, 'cat' => 9 );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ) : ?>
          <?php setup_postdata($post);?>
         <div class="BannerPesquisa">
         <?php 
         
                if(has_post_thumbnail()){
                
                    the_post_thumbnail('thumb-post', array( 'class' => 'img-thumbnail' )); 
//                    the_post_thumbnail('img-responsive responsive--full');

                }
          
                
          
          ?>
          </div>
           
          <div class="resumoPesquisaBanner">
              <a href="<?php the_permalink(); ?>" ><span ><?php echo resume(get_the_title(), 150); ?></span> </a>
          </div>
           
      <?php endforeach; ?> 
     </div>
    <div class="col-md-12">
      <?php
      global $post;
      $i = 0;
      $args = array( 'numberposts' => 3, 'cat' => 20 );
      $myposts = get_posts( $args ); ?>
     
      <?php foreach( $myposts as $post ) : 
            setup_postdata($post);?>
            <div class="PesquisaSecundarios">
            <div class="BannerPesquisaSecundarios">
                       <?php if(has_post_thumbnail()){
                       the_post_thumbnail('thumb-post', array( 'class' => 'img-thumbnail' )); }?>
              </div>
              <div class="resumoPequenosPesquisaBanner">
                 <a href="<?php the_permalink(); ?>" ><?php echo resume(get_the_title(), 75); ?></a>
             </div>
            </div>
      <?php endforeach; ?>
    </div>
</div>


<div class="MaisNoticiasDestaques"><a href="#">Veja Mais</a></div>

<div class="divisoriaDestaques"></div>

<div class="areaExtensaoPostagens">
    <div class="zebrado">
        <span class="tituloBannerExtensao">EXTENSÃO</span>
    </div>


    
    
    
    <!-- PARTE DO BANNER PRINCIPAL -- INICIO -->
    
    <div class="LadoBannerPrincipalExtensao">
    <div class="ExtensaoPrincipal">
        
      <?php
      global $post;
      $args = array( 'numberposts' => 1, 'cat' => 20 );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ) : ?>
          <?php setup_postdata($post);?>
         <div class="BannerExtensao">

                       <?php if(has_post_thumbnail()){
                       the_post_thumbnail('thumb-post', array( 'class' => 'img-thumbnail' )); }?>
          </div>
           
          <div class="resumoExtensaoBanner">
              <a href="<?php the_permalink(); ?>" ><span ><?php echo resume(get_the_title(), 150); ?></span> </a>
          </div>
           
      <?php endforeach; ?>   
      </div>
    </div>
    
    
    
    
    
    <!-- PARTE DO BANNER PRINCIPAL -- FINAL -->
 
    <!-- PARTE DOS BANNERS SECUNDÁRIOS -- INICIO -->
    
    <div class="LadoBannerSecundarioExtensao">
        
         <?php
      global $post;
      $i = 0;
      $args = array( 'numberposts' => 3, 'cat' => 20 );
      $myposts = get_posts( $args ); ?>
     
      <?php foreach( $myposts as $post ) : 
            setup_postdata($post);?>
            <div class="ExtensaoSecundarios">
        <div class="BannerExtensaoSecundarios">
                       <?php if(has_post_thumbnail()){
                       the_post_thumbnail('thumb-post', array( 'class' => 'img-thumbnail' )); }?>
              </div>
              <div class="resumoPequenosExtensaoBanner">
                 <a href="<?php the_permalink(); ?>" ><?php echo resume(get_the_title(), 75); ?></a>
             </div>
            </div>
      <?php endforeach; ?>

    </div>
    <!-- PARTE DOS BANNERS SECUNDÁRIOS -- FINAL -->


    <div class="ParteBannerEmbaixoTopicos">
        
    <div class="BotoesLinksExtensao" align="center">
        <p class="AlinhamentoParagrafoBotoesExtensao"> 
        <button class="ui vk button">
          <i class="vk icon"></i>
          MEIO AMBIENTE
        </button>
        </p>
        
        <p class="AlinhamentoParagrafoBotoesExtensao">
        <button class="ui vk button">
          <i class="vk icon"></i>
          ENGENHARIA
        </button>
        </p>
        
        <p class="AlinhamentoParagrafoBotoesExtensao">
        <button class="ui vk button">
          <i class="vk icon"></i>
          TECNOLOGIA
        </button>
        </p>
    </div>


    <div class="BotoesLinksExtensao2" align="center">
        <p class="AlinhamentoParagrafoBotoesExtensao">
        <button class="ui vk button">
          <i class="vk icon"></i>
          MEIO AMBIENTE
        </button>
        </p>
        
        <p class="AlinhamentoParagrafoBotoesExtensao">
        <button class="ui vk button">
          <i class="vk icon"></i>
          ENGENHARIA
        </button>
        </p>
        
        <p class="AlinhamentoParagrafoBotoesExtensao">
        <button class="ui vk button">
          <i class="vk icon"></i>
          TECNOLOGIA
        </button>
        </p>
    </div>

  </div>

</div>

<div class="MaisNoticiasDestaques"><a href="#">Veja Mais</a></div>
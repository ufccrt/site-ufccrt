<?php get_header(); ?>
<?php function resume( $var, $limite ){	// Se o texto for maior que o limite, ele corta o texto e adiciona 3 pontinhos.	
        if (strlen($var) > $limite)	{		
          $var = substr($var, 0, $limite);		
          $var = trim($var) . " (...)";	
          
        }
        return $var;
  
}?>     
    
    <?php 
    
    if(is_front_page()){
    
    ?>
    <div class="py-5">
        <div class="container layout_centro">
          <div class="row">
            <div class="col-md-12 configMargemSlideShow novoSlideShowAdaptacoes">
              
              <?php 
                  echo do_shortcode("[metaslider id=301]");
                  
              ?>
          
            </div>
          </div>
        </div>
      </div> 

    <?php }?>


      <div class="py-5">
          <div class="container layout_centro">
            <div class="row sombraDivs">
              <!--<div class="col-md-3 sombraDivMenuEsquerdo EspacamentoTopoMenuLateral "> 
                  <div id="sidebar-primary" class="nav-link">
                      <?php// dynamic_sidebar( 'menu_lado' ); ?>
                  </div>
                  -->
                  <div class="a-rapido">                  
<hr><h4>Acesso Rápido </h4><br>
<div class="bannergroup banners">
  <div class="banneritem">
																																																															<a href="https://si3.ufc.br/sigaa/verTelaLogin.do%3bjsessionid=D362AB0DEA90125063FD8CFBBA82923A.node22" title="Acesso ao SI3">
							<img class="bannerAcessoRapido" src="http://ufc.br/images/banners/banner_si3.jpg" alt="Acesso ao Sistema Integrado de Informações Institucionais da UFC - SI3.">
						</a>
																<div class="clr"></div>
	</div>
                      	<div class="banneritem">
																																																															<a
							href="http://www.sisu.ufc.br/"
							title="Acesse o sítio eletrônico do SiSU na UFC">
							<img
								src="http://ufc.br/images/banners/sisu2.png"
								alt="Acesse o sítio do SiSU na UFC"
								class="bannerAcessoRapido"
																							/>
						</a>
																<div class="clr"></div>
	</div>
  <div class="banneritem">																																								<a href="http://www.ufc.br/a-universidade/documentos-oficiais/313-plano-de-desenvolvimento-institucional-pdi" title="PDI 2013 - 2017">
                                                          <img class="bannerAcessoRapido" src="http://ufc.br/images/banners/banner_pdi-2013-2017.png" alt="Plano de Desenvolvimento Institucional 2013 - 2017">
                                                  </a>																<div class="clr"></div>
  </div>

</div>
                  </div>
<hr>
</div> <!-- Fim col-md-3-->
<div class="col-md-12">
  <ul class="nav nav-pills flex-column <?php echo  (is_front_page())? ' ': 'pi-draggable comBordaTracos' ?>" draggable="true">
    <li class="nav-link">
      <a class="nav-link DiminuirrecuoEsquerda" href="#">
        <!--<i class="fa fa-home fa-home"></i> --><strong><h4 class="widget-title"><?php the_title(); ?></h4></strong></a>
    </li>
  </ul>
  <!-- Resumo do post -->

       <?php  if (has_excerpt() ) { 
                 echo '<span class="resumoNoticia">';
                 the_excerpt(); 
                 echo '</span>';
       } ?>
                 
             
      <?php   if(is_front_page()){ 

          include_once 'principal_2.php';

      }else{?>
      
     <div class="dataPostagem">Última Atualização: <?php the_modified_date('d/m/Y H:i'); ?></div>
      <?php 
      if ( have_posts() ) {
              while ( have_posts() ) {
                      the_post(); 
                      the_content();
              } // end while
      }} // end if
      ?> 
              </div>
              <div class="espacamentoNormal"></div>
            </div>
          </div>
      </div>
</div>
              
<!-- ***********************************************************-->
</div>
</div>
</div>

<?php get_footer(); ?>


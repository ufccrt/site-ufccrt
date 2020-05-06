<?php get_header(); ?>
    <?php function resume( $var, $limite ){	// Se o texto for maior que o limite, ele corta o texto e adiciona 3 pontinhos.	
            if (strlen($var) > $limite)	{		
              $var = substr($var, 0, $limite);		
              $var = trim($var) . " (...)";	
              
            }
            return $var;
      
    }?>     
    
   

   
<!--CORPO-->
<div class="container">
  
  <!-- Resumo do post -->
             
             
      <?php   if(is_front_page()){ 

        include_once 'principal_10.php';

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


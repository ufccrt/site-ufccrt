
<?php get_header(); ?>
      <?php
        function resume( $var, $limite ){	// Se o texto for maior que o limite, ele corta o texto e adiciona 3 pontinhos.	
          if (strlen($var) > $limite)	{		
                  $var = substr($var, 0, $limite);		
                  $var = trim($var) . " (...)";	
                }
          return $var;
          }
      ?>     
<div class="container-fluid corpo-site">
      <?php
        //HOME PAGE
        if(is_front_page()){ 
          include_once 'views/sessoes-home/slide-home.php';
          include_once 'views/principal.php';
          include_once 'views/sessoes-home/acessorapido.php';
        }else{
          include_once 'views/conteudo.php';
        }
        //FIM HOME PAGE
      ?>
</div>

<?php get_footer(); ?>

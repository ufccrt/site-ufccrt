<html>
<head>
  <meta charset="utf-8">
  <meta property="og:image" content="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/imgs/compartilhar.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/css/semantic_ui/semantic.min.css" type="text/css">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
  <link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/asserts/font-awesome/css/font-awesome.min.css" type="text/css">
  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <meta name="description" content="Universidade Federal do Ceará">
  <meta name="keywords" content="Universidade Federal, UFC, Universidade Pública">
  <link rel="icon" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/imgs/indice.png">
  <?php wp_head();?>
  
  
  <!-- add gallery justificada -->
  
  	<link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/css/gallery_justify/css/justifiedGallery.min.css" type="text/css">
  	<link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/galery/css/colorbox.css" type="text/css">
  
  <!-- add gallery justificada -->
  
</head>
<body>
  <!-- BARRA DE ACESSO A INFORMAÇÃO - GOVERNO FEDERAL -->
  <div id="barra-brasil">
    <a href="http://brasil.gov.br" style="background:#7F7F7F; height: 20px; padding:4px 0 4px 10px; display: block; font-family:sans,sans-serif; text-decoration:none; color:white; ">Portal do Governo Brasileiro</a>
  </div>

  <!-- BARRA DE ACESSO A INFORMAÇÃO - GOVERNO FEDERAL -->
  <div id="containerGeral" class="containerGeral">
    <!-- ***************** HEADER ************* -->

    <nav class="navbar navbar-expand-md navbar-light bg-faded">
      <div class="container layout_centro sombraDivTopo">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item text-center">
              <a class="nav-link" href="http://www.acessibilidade.ufc.br/servicos/">Acessibilidade</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="#">Fonte A</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="#">Fonte A+</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="#">Fonte A-</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link" href="#">Contraste</a>
            </li>
          </ul>
          <div class="form-inline my-2 my-lg-0 adaptacao_Pesquisa_Icones_Redes_Sociais">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item text-center">
                <a class="nav-link icones" href="https://www.facebook.com/ufccrateus/"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
              </li>
              <li class="nav-item text-center">
                <a class="nav-link icones" href="https://twitter.com/ufccrateus"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
              </li>
              <li class="nav-item text-center">
                <a class="nav-link icones" href="https://www.youtube.com/channel/UCxOdbP-2qVvypSzhl3IScZQ"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a>
              </li>
              <li class="nav-item text-center">
                <a class="nav-link icones" href="https://www.flickr.com/people/153875587@N03/"><i class="fa fa-flickr fa-2x" aria-hidden="true"></i></a>
              </li>
              <li class="nav-item text-center"> </li>
               <li class="nav-item text-center">
                  <form class="formPesquisaTopo" role="search" method="get"  action="<?php echo home_url( '/' ); ?>">
                       <input  type="search" class="form-control mr-sm-2 iconePesquisaForm "
                       placeholder="<?php echo esc_attr_x( 'Buscar …', 'placeholder' ) ?>"
                       value="<?php echo get_search_query() ?>" name="s"
                       title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                   </form>
               </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light bg-faded text-center novoFundoAlternativo">
       <div class="container layout_centro sombraDivLogo  novoFundoAlternativo2">
        <div class="logoUFC_adaptacoes">
            <a href="<?php echo site_url();?>" title="<?php bloginfo('name'); ?>">
            <img class="img-fluid d-block logo_margem" src="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/imgs/logo_campus.png">
          </a>
        </div>
        <button class="navbar-toggler navbar-toggler-center" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon">
      </span> </button>
        <div class="collapse navbar-collapse justify-content-center text-right" id="navbar2SupportedContent">

            <div class="MenuTopoAlteracao">
              UFC - 2020
              <?php                        
              wp_nav_menu( array(
                                'menu' => 'menu_topo',
                                'theme_location' => 'menu_topo',
                                'depth' => 3,
                                'container' => false,
                                'menu_class' => 'nav',
                                //Process nav menu using our custom nav walker
                                'walker' => new wp_bootstrap_navwalker())
                              );
              ?> 
            </div>
        </div>
      </div>
    </nav>

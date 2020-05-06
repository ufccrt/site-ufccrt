<html>
    <head>
        <meta charset="utf-8">
        <meta property="og:image" content="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/imgs/compartilhar.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/css/semantic_ui/semantic.min.css" type="text/css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
        <link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/assertsfont-awesome.min.css/font-awesome/css/font-awesome.min.css" type="text/css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <meta name="description" content="Universidade Federal do Ceará">
        <meta name="keywords" content="Universidade Federal, UFC, Universidade Pública">
        <link rel="icon" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/imgs/indice.png">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <?php wp_head();?>
        
        
        <!-- add gallery justificada -->
        
            <link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/css/gallery_justify/css/justifiedGallery.min.css" type="text/css">
            <link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/galery/css/colorbox.css" type="text/css">
        
        <!-- add gallery justificada -->
        <script>
            
            $(document).ready(function(){  
                $("#campoBusca").focus(function(){
                    $("#buscar").slideDown(300);
                 });
                 $("#campoBusca").blur(function(){
                    $("#buscar").slideUp(300);
                 });
                
                
            });
               
            
</script>
    
    </head>
    <body>
    <!-- BARRA DE ACESSO A INFORMAÇÃO - GOVERNO FEDERAL -->
     <div id="barra-brasil">
            <a href="http://brasil.gov.br" style="background:#7F7F7F; height: 20px; padding:4px 0 4px 10px; display: block; font-family:sans,sans-serif; text-decoration:none; color:white; ">Portal do Governo Brasileiro</a>
     </div>

    <header class="container-fluid row">
        <div class="container-fluid acessibilidade">
           <div class="container links-acessibilidade">Acessibilidade</div> 
        </div>
        <div class="container">
            <div class="col-md-4 logo-campus">
                <a href="<?php echo site_url();?>" title="<?php bloginfo('name'); ?>">
                <img class="img-fluid d-block logo_margem" src="http://sistemas.crateus.ufc.br/wordpress/wp-content/themes/ufc-oficial/imgs/logo_ufc_crateus.png"></a>
            </div>
            <div class="col-md-8 busca-nav">
                <div class="col-md-12 social-link">
                    <a href="#" class="float-left"><i class="icon-facebook"></i></a>
                    <a href="#" class="float-left"><i class="icon-instagram"></i></a>
                </div>
                <div class="col-md-12 busca">
                    <form id="busca" class="formPesquisaTopo" role="search" method="get"  action="<?php echo home_url( '/' ); ?>">
                            <input id="campoBusca" type="search" class="form-control mr-sm-2 iconePesquisaForm "
                            placeholder="<?php echo esc_attr_x( 'Buscar …', 'placeholder' ) ?>"
                            value="<?php echo get_search_query() ?>" name="s"
                            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>"  autocomplete="off"/>
                            
                    </form>
                    <button id="buscar" class="esconde-buscarh" style="display:none" type="submit" form="busca" value="Submit">IR <i class="icon-chevron-right"></i></button>
                </div>
            
            </div>
        </div>
        <div class="container-fluid row menu-principal">
                <nav class="navbar navbar-expand-md  container navbar-light bg-faded text-center novoFundoAlternativo">
                     <button class="navbar-toggler navbar-toggler-center botão-menu-mobile" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span> MENU PRINCIPAL</span>
                    </button>
                    <!--menu em colapso-->
                        <div class="collapse navbar-collapse justify-content-center " id="navbar2SupportedContent">

                            <div class="MenuTopoAlteracao">
                            
                            <?php                        
                            wp_nav_menu( array(
                                                'menu' => 'menu_topo',
                                                'theme_location' => 'menu_topo',
                                                'depth' => 10,
                                                'container' => false,
                                                'menu_class' => 'nav',
                                                'walker' => new wp_bootstrap_navwalker())
                                            );
                            ?> 
                            </div>
                        </div>
                    </div>
                
                </nav>
        </div>
    </header>
    
<?php
require_once('wp-bootstrap-navwalker.php');

$SMALL = "300x300";

function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );

/*Registrar os menus*/
if ( function_exists( 'register_nav_menu' ) ) {

register_nav_menu( 'menu_topo', 'Menu Topo' );

register_nav_menu( 'menu_lado', 'Menu Lado' );


}


/*Permitir que se insira classe no menu pelo painel admim*/
function discard_menu_classes($classes, $item) {
    $classes = array_filter( 
        $classes, 
        create_function( '$class', 
                 'return in_array( $class, 
                      array( "current-menu-item", "current-menu-parent" ) );' )
        );
    return array_merge(
        $classes,
        (array)get_post_meta( $item->ID, '_menu_item_classes', true )
        );
}

/*Remover as classe padrão do wordpress*/
function remove_nav_menu_classes($classes) {
    return array(); 
}

add_filter('nav_menu_css_class','remove_nav_menu_classes');
add_filter('nav_menu_css_class', 'discard_menu_classes', 10, 2);


/*Side BAR para MENU Lateral*/
function themename_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'primary ', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'menu_lado', 'theme_name' ),
        'id'            => 'sidebar-3',
        'before_widget' => '<ul class="nav nav-pills flex-column pi-draggable" draggable="true"><li class="nav-link">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'themename_widgets_init' );

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails', array( 'post' ) ); // Adicionar para Posts
add_theme_support( 'post-thumbnails', array( 'page' ) ); // Adicionar para Páginas
add_theme_support( 'post-thumbnails', array( 'class' => 'teste ronaldo' ) ); // Adicionar para Páginas


set_post_thumbnail_size( 220, 140 ); // 50 pixeis de largura por 50 pixeis de altura, no modo box-resizing.

function insert_image_src_rel_in_head() {
  global $post;
  if ( !is_singular()) //verificar se é um post
    return;
  if(!has_post_thumbnail( $post->ID )) { //verifica se existe imagem desta
    $default_image="http://crateus.ufc.br/wp-content/uploads/2017/07/img4.jpg"; //coloque a url da imagem padrao
    echo '';
  }
  else{
    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
    echo '';
  }
  echo "";
}

add_action( 'wp_head', 'insert_image_src_rel_in_head', 5 );

// Definimos um nome, a largura e altura
// Sem o tipo de corte, a miniatura terá tamanho proporcional ao definido
add_image_size('550x296', 550, 296, true);

// Ou então definimos um nome, largura, altura e o tipo de corte
// No caso, a miniatura será cortada exatamente nos tamanhos definidos
add_image_size('259x121', 259, 121, true);

$limit=20;
// Limite de caracteres
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function custom_excerpt_length( $length ) {
 return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length');



// Função para trabalhar com o Hook pre_get_posts
function my_pre_get_posts($args) {

    // Não executamos nada se estamos na administração ou fora da query padrão do WP
    if(is_admin() || !$args->is_main_query())
        return $args;

    // A página corrente é a que queremos atingir?
//    if(is_category()) {

        // Alteramos a quantidade de posts por página
        $args->query_vars['posts_per_page'] = 10;

//    }

    // Retornando os argumentos da query
    return $args;
}

// Conectando nossa função com o Hook pre_get_posts
add_action('pre_get_posts', 'my_pre_get_posts');

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Página " . $paged . "  de " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}
remove_action('wp_head', 'wp_generator');


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

function isPage(){
  global $post;
  return $post->post_type === 'page';
}

function isPost(){
  global $post;
  return $post->post_type === 'post';
}

function viewPost(){
    // PAGINA NOTÍCIA (Post)
      if ( have_posts() ) {
        while(have_posts()){
          the_post(); 
          the_content();
        }
    }
}

function meu_bottom() {

  register_meu_bottom( array(
  'name' => 'Menu de Rodapé',
  'id' => 'menu-de-rodape',
  'before_widget' => '<div class="widget">',
  'after_widget' => '</div>',
  'before_title' => '<h2 class="titulodaarea">',
  'after_title' => '</h2>',
  'description' => 'área de widget de exemplo',
  ) );
 
 }
 add_action( 'widgets_init', 'meu_widget' );

 //breadcrumbs
 function custom_breadcrumbs() {
       
  // Configuracoes
  $separator          = '»';
  $breadcrums_id      = 'breadcrumbs';
  $breadcrums_class   = 'breadcrumb';
  $home_title         = "<i class='fas fa-home'></i>";
    
  // Se você tiver algum tipo de postagem personalizado com taxonomias personalizadas, coloque o nome da taxonomia abaixo (e.g. product_cat)
  $custom_taxonomy    = 'product_cat';
     
  // Obter as informações de consulta e publicação
  global $post,$wp_query;

     
  // Não exibir na página inicial
  if ( !is_front_page() ) {
     
      // Construa o breadcrumbs
      echo '<span class="small-bread">Você está aqui:</span> <ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
         
      // Home page
      echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';

         
      if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
            
          echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</span></li>';
            
      } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
            
          // Se post é um tipo de postagem personalizado
          $post_type = get_post_type();
            
          // Se for um nome e link de exibição de tipo de postagem personalizado
          if($post_type != 'post') {
                
              $post_type_object = get_post_type_object($post_type);
              $post_type_archive = get_post_type_archive_link($post_type);
            
              echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              echo '<li class="separator"> ' . $separator . ' </li>';
            
          }
            
          $custom_tax_name = get_queried_object()->name;
          echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></li>';
            
      } else if ( is_single() ) {
            
          $post_type = get_post_type();
            
          if($post_type != 'post') {
                
              $post_type_object = get_post_type_object($post_type);
              $post_type_archive = get_post_type_archive_link($post_type);
            
              echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              echo '<li class="separator"> ' . $separator . ' </li>';
            
          }
            
          // Obter informações de categoria
          $category = get_the_category();
           
          if(!empty($category)) {
            
              // A última publicação da categoria está em
              $last_category = end(array_values($category));
                
              // Obter pai de qualquer categoria
              $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
              $cat_parents = explode(',',$get_cat_parents);
                
              // Loop através de categorias pai e armazenar em variável $ cat_display
              $cat_display = '';
              foreach($cat_parents as $parents) {
                  $cat_display .= '<li class="item-cat">'.$parents.'</li>';            
              }
           
          }
            
          // Se for um tipo de publicação personalizado dentro de uma taxonomia personalizada
          $taxonomy_exists = taxonomy_exists($custom_taxonomy);
          if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                 
              $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
              $cat_id         = $taxonomy_terms[0]->term_id;
              $cat_nicename   = $taxonomy_terms[0]->slug;
              $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
              $cat_name       = $taxonomy_terms[0]->name;
             
          }
            
          // Verifique se o post está em uma categoria
          if(!empty($last_category)) {
              echo $cat_display;
              echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
                
          // Em caso de publicação em uma taxonomia personalizada
          } else if(!empty($cat_id)) {
                
              echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
              echo '<li class="separator"> ' . $separator . ' </li>';
              echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
            
          } else {
                
              echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
                
          }
            
      } else if ( is_category() ) {
             
          // Página Category
          echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';
             
      } else if ( is_page() ) {
             
          // Página padrão
          if( $post->post_parent ){
                 
      
              $anc = get_post_ancestors( $post->ID );                 

              $anc = array_reverse($anc);                   

              if ( !isset( $parents ) ) $parents = null;
              foreach ( $anc as $ancestor ) {
                  $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                  $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
              }
                 
              echo $parents;
                 
              // Página Atual
              echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';
                 
          } else {
                 
              // Basta exibir a página atual se não os pais
              echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';
                 
          }
             
      } else if ( is_tag() ) {
             
          // Página de Tag
             
          // Obter informações de tag
          $term_id        = get_query_var('tag_id');
          $taxonomy       = 'post_tag';
          $args           = 'include=' . $term_id;
          $terms          = get_terms( $taxonomy, $args );
          $get_term_id    = $terms[0]->term_id;
          $get_term_slug  = $terms[0]->slug;
          $get_term_name  = $terms[0]->name;
             
          // Exibir o nome da Tag
          echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';
         
      } elseif ( is_day() ) {
             
          // Day archive
             
          // Year link
          echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
          echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
             
          // Month link
          echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
          echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
             
          // Day display
          echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';
             
      } else if ( is_month() ) {
             
          // Arquivo               

          echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
          echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
             

          echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';
             
      } else if ( is_year() ) {
             

          echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';
             
      } else if ( is_author() ) {
             
          // Autor
             
          // Get the author information
          global $author;
          $userdata = get_userdata( $author );
             

          echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';
         
      } else if ( get_query_var('paged') ) {
             

          echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></li>';
             
      } else if ( is_search() ) {
         
          // Página Search
          echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Resultado da pesquisa por: ' . get_search_query() . '">Resultado da pesquisa por: ' . get_search_query() . '</span></li>';
         
      } elseif ( is_404() ) {
             
          // Pagina 404
          echo '<li>' . 'Página não encontrada' . '</li>';
      }
     
      echo '</ul>';
         
  }
     
}
//FIM breadcrumbs
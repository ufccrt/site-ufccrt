<?php
require_once('wp-bootstrap-navwalker.php');

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

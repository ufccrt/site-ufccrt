<?php get_header(); ?>
<div class="py-5">
          <div class="container layout_centro">
            <div class="row sombraDivs">
              <div class="col-md-3 sombraDivMenuEsquerdo EspacamentoTopoMenuLateral">              
                  <div id="sidebar-primary" class="nav-link">
                      <?php dynamic_sidebar( 'menu_lateral' ); ?>
                  </div>
              </div>      
              <div class="col-md-9">
                <ul class="nav nav-pills flex-column pi-draggable comBordaTracos" draggable="true">
                  <li class="nav-link">
                    <a class="nav-link DiminuirrecuoEsquerda" href="#">
                      <!--<i class="fa fa-home fa-home"></i> --><strong><h4 class="widget-title">Página não encontrada</h4></strong></a>
                  </li>
                 
                </ul>
                <div id="post-0" class="post error404 not-found">
                    <img src="http://ufc.br/templates/portal/images/404.png" title="página não encontrata volte para o início da página">
                </div><!-- #post-0 -->
                   
              </div><!-- #content -->
            </div><!-- #container -->
          </div>
</div>
 
<?php get_footer(); ?>
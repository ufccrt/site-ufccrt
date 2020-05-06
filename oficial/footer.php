   


<!-- FINAL DO CONTEUDO - ARTICLE -->
    <!-- ***************** FOOTER ************* -->
    <footer>
      <div class="bg-faded py-5 ">
        <div class="container layout_centro BordasInferioresArredondadas sombraDivFooter FooterSegundoModelo">
          <div class="row adaptacao_footer ">
            <!-- O efeito da sombra ajudou na divisória, então não precisa disso -->
            <!-- <div class="separador"></div> -->
            <!-- --------------------------------------------------------------- -->
            <div class="col-md-3">
              <p> </p>
              <ul class="nav nav-pills flex-column pi-draggable" draggable="true">
                <li class="nav-item alteracaoFooterContatos">
                  <a href="<?php echo home_url( '/' ); ?>fale-conosco/" class="nav-link recuoEsquerda"><i class="fa fa-phone"></i><span class="espaco1"><strong>Fale Conosco</strong></span></a>
                </li>
                
                <li class="nav-item alteracaoFooterContatos">
                  <a href="<?php echo home_url( '/' ); ?>localizacao/" class="nav-link recuoEsquerda"><i class="fa fa-map-marker"></i><span class="espaco3"><strong>Ver Mapa</strong></span></a>
                </li>
                <li class="nav-item alteracaoFooterContatos">
                  <a href="https://sistema.ouvidorias.gov.br/publico/Manifestacao/RegistrarManifestacao.aspx" class="nav-link recuoEsquerda"><i class="fa fa-volume-control-phone"></i><span class="espaco4"><strong>Ouvidoria</strong></span></a>
                </li>                
              </ul>
            </div>
            <div class="col-md-3">
              <p> </p>
              <ul class="nav nav-pills flex-column pi-draggable" draggable="true">
                <li class="nav-item alinhamentoCentral alteracaoFooterContatos"> <span class="nav-link"><i class="fa fa-link"></i><span class="espaco1 espacamento"><strong>Link's Úteis</strong></span></span>
                </li>
                <li class="nav-item alinhamentoCentral alteracaoFooterContatos">
                  <a href="https://www.mec.gov.br/" target="_blank" class="nav-link"><span class="espaco2">Ministério da Educação e Cultura</span></a>
                </li>
                <li class="nav-item alinhamentoCentral alteracaoFooterContatos">
                  <a href="http://portal.inep.gov.br/" class="nav-link" target="_blank"><span class="espaco2">INEP (ENEM/SiSU)</span></a>
                </li>
                <li class="nav-item alinhamentoCentral alteracaoFooterContatos">
                  <a href="http://www.progep.ufc.br/" class="nav-link" target="_blank"><span class="espaco2">UFC/PROGEP</span></a>
                </li>
              </ul>
            </div>
            <div class="col-md-3 ">
              <p> </p>
              <ul class="nav nav-pills flex-column pi-draggable" draggable="true">
                <li class="nav-item alinhamentoCentral"> <span class="nav-item alteracaoFooterContatos"><span class="espaco2 espacamento">BR 226, KM 4 - Venâncios</span></span>
                </li>
                <li class="nav-item alinhamentoCentral"> <span class="nav-item alteracaoFooterContatos"><span class="espaco2">Crateús-CE</span></span>
                </li>
                <li class="nav-item alinhamentoCentral"> <span class="nav-item alteracaoFooterContatos"><span class="espaco2">CEP: 63.700-000</span></span>
                </li>
                <li class="nav-item alinhamentoCentral"> <span class="nav-item alteracaoFooterContatos"><span class="espaco2">crateus@ufc.br</span></span>
                </li> <span class="alinhamentoCentral">
              <li class="icones_redes_sociais_rodape ">
                <a href="https://www.facebook.com/ufccrateus/">
                  <span class="nav-link iconesModelo2">
                    <i class="fa fa-facebook-square icones"></i>
                  </span> </a>
                </li>
                <li class="icones_redes_sociais_rodape"> 
                    <a href="https://twitter.com/ufccrateus">
                        <span class="nav-link iconesModelo2">
                            <i class="fa fa-twitter-square icones"></i>
                        </span>
                    </a>
                </li>
                <li class="icones_redes_sociais_rodape"> 
                    <a href="https://www.youtube.com/channel/UCxOdbP-2qVvypSzhl3IScZQ">
                        <span class="nav-link iconesModelo2">
                            <i class="fa fa-youtube-play icones"></i>
                        </span>
                    </a>
                </li>
                <li class="icones_redes_sociais_rodape"> 
                    <a href="https://www.flickr.com/people/153875587@N03/">
                        <span class="nav-link iconesModelo2">
                            <i class="fa fa-flickr icones"></i>
                        </span>
                    </a>
                </li>
                </span>
              </ul>
            </div>
            <div class="col-md-3 LogoBrasil">
             <div>
              <p class="GovernoFederalLogoFooter"> 
              <a href="http://brasil.gov.br"><img src="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/imgs/brasil3.png" class="imgBrasil"/> </a>
              </p>
              </div>
            </div>            
          </div>
          
          <div class="row">
             <div class="copy">© 2017 Divisão de Tecnologia da Informação </div>
          </div>
          
        </div>
      </div>
    </footer>
    <!-- FINAL DO FOOTER -->
    
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
    <script src="http://barra.brasil.gov.br/barra.js" type="text/javascript" defer="" async=""></script>
    <script src="js/jquery.js" type="text/javascript" defer="" async=""></script>
    
        <!-- add gallery justificada -->
		
<script src="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/js/gallery_justify/js/jquery.justifiedGallery.min.js"></script>  
<script src="<?php echo home_url( '/' ); ?>wp-content/themes/oficial/galery/js/jquery.colorbox-min.js"></script>
  		
<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1', transition:"fade", width:"800px"});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
		
<script type="text/javascript">

        $("#galeriaAcademica").justifiedGallery();

</script>
		
        <!-- add gallery justificada -->
    
  </div>
  <div class="espacamentoFinal"></div>
  <?php  wp_footer(); ?>
</body>

</html>

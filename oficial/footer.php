<footer>
<?php 

    $siteDir = "/wordpress";

    dynamic_sidebar( 'menu-de-rodape' ); 
?>

       <div class="container">

        <div class="row row-custom">

            <div class="col-md-4 footer-custom">
                <h2 class="oculto">
                    <a id="menu-rodape" class="title-footer">Mais UFC</a>
                </h2>
                <div class="m-menu">
                    <ul class="menu-rodape">
                        <li class=""><a href="<?php echo $siteDir;?>/biblioteca" class="link">Biblioteca</a></li>
                        <li class=""><a href="<?php echo $siteDir;?>/cultura-e-arte" class="link">Cultura e Arte</a></li>
                        <li class=""><a href="<?php echo $siteDir;?>/gestao-ambiental" class="link">Gestão Ambiental</a></li>
                        <li class=""><a href="<?php echo $siteDir;?>/hospitais-e-saude" class="link">Hospitais e Saúde</a>
                        </li>
                        <li class=""><a href="<?php echo $siteDir;?>/desporto-universitario" class="link">Desporto Universitário</a>
                        </li>
                        <li class=""><a href="<?php echo $siteDir;?>/memoria-da-ufc" class="link">Memória da UFC</a></li>
                        <li class=""><a href="<?php echo $siteDir;?>/licitacoes" class="link">Licitações</a></li>
                        <li class=""><a href="<?php echo $siteDir;?>/noticias/noticias-e-editais-de-concursos-e-selecoes"
                                class="link">Notícias e Editais de Concursos e Seleções</a></li>
                        <li class="t"><a href="<?php echo $siteDir;?>/editais-e-concursos/graduacao" class="link">Editais e
                                Concursos</a></li>
                        <li class=""><a href="<?php echo $siteDir;?>/comunicacao-e-marketing/equipe-responsavel-e-contato"
                                class="link">Comunicação e Marketing</a></li>
                        <li><a class="ir-topo" href="#">Ir para o topo</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 footer-custom">
                <h2 class="oculto">
                    <a id="menu-portal" class="title-footer">Portal</a>
                </h2>
                <div class="m-menu">
                    <ul>
                        <li class="item i343 parent"><a href="<?php echo $siteDir;?>/sobre-o-sitio" class="link">Sobre o sítio</a></li>
                        <li class="item i344"><a href="<?php echo $siteDir;?>/dominios-ufc-br" class="link">Dominios ufc.br</a></li>
                        <li class="item i345"><a href="<?php echo $siteDir;?>/mapa-do-sitio" class="link">Mapa do sítio</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 footer-custom">

                <div class="endereco title-footer">
                    <h2 class="oculto">Endereço</h2>
                    <address>
                        <span class="postal">
                            BR 226, KM 04, Lado PAR - José Rosa, Crateús-CE, CEP 63.707-800
                        </span> <br>
                        <span class="tel">Fone: +55 (88) 3691-9700</span> <br>
                        <span class="email">E-mail: crateus@ufc.br</span>
                    </address>
                </div>
                <!-- fim da div endereco -->

            </div>
            <!-- fim da div col-md-4 -->

            </div>

        </div>
        <!-- fim da div container -->



        <div id="creditos">
            <div class="container dti">
                <span class="twelve columns">© 2021 <a href="http://sistemas.crateus.ufc.br" 
                        title="Créditos">Divisão de Tecnologia da Informação/Divisão de Comunicação</a>
                </span>
            </div>
        </div>
    



</footer>

<!-- FINAL DO FOOTER -->






<script>
    $(document).ready(function () {
        //Examples of how to assign the Colorbox event to elements
        $(".group1").colorbox({ rel: 'group1', transition: "fade", width: "800px" });
        $(".group2").colorbox({ rel: 'group2', transition: "fade" });
        $(".group3").colorbox({ rel: 'group3', transition: "none", width: "75%", height: "75%" });
        $(".group4").colorbox({ rel: 'group4', slideshow: true });
        $(".ajax").colorbox();
        $(".youtube").colorbox({ iframe: true, innerWidth: 640, innerHeight: 390 });
        $(".vimeo").colorbox({ iframe: true, innerWidth: 500, innerHeight: 409 });
        $(".iframe").colorbox({ iframe: true, width: "80%", height: "80%" });
        $(".inline").colorbox({ inline: true, width: "50%" });
        $(".callbacks").colorbox({
            onOpen: function () { alert('onOpen: colorbox is about to open'); },
            onLoad: function () { alert('onLoad: colorbox has started to load the targeted content'); },
            onComplete: function () { alert('onComplete: colorbox has displayed the loaded content'); },
            onCleanup: function () { alert('onCleanup: colorbox has begun the close process'); },
            onClosed: function () { alert('onClosed: colorbox has completely closed'); }
        });

        $('.non-retina').colorbox({ rel: 'group5', transition: 'none' })
        $('.retina').colorbox({ rel: 'group5', transition: 'none', retinaImage: true, retinaUrl: true });

        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function () {
            $('#click').css({ "background-color": "#f00", "color": "#fff", "cursor": "inherit" }).text("Open this window again and this message will still be here.");
            return false;
        });
        
    });
    
    
</script>

<script type="text/javascript">

    // $("#galeriaAcademica").justifiedGallery();

</script>

<!-- add gallery justificada -->

</div>
<?php  wp_footer(); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://barra.brasil.gov.br/barra_2.0.js" type="text/javascript"></script>
</body>

</html>
<footer>
<?php dynamic_sidebar( 'menu-de-rodape' ); ?>


       <div class="container">

        <div class="row">

            <div class="col-md-4 footer-custom">
                <h2 class="oculto">
                    <a id="menu-rodape">Mais UFC</a>
                </h2>
                <div class="m-menu">
                    <ul class="menu-rodape">
                        <li class=""><a href="/biblioteca" class="link">Biblioteca</a></li>
                        <li class=""><a href="/cultura-e-arte" class="link">Cultura e Arte</a></li>
                        <li class=""><a href="/gestao-ambiental" class="link">Gestão Ambiental</a></li>
                        <li class=""><a href="/hospitais-e-saude" class="link">Hospitais e Saúde</a>
                        </li>
                        <li class=""><a href="/desporto-universitario" class="link">Desporto Universitário</a>
                        </li>
                        <li class=""><a href="/memoria-da-ufc" class="link">Memória da UFC</a></li>
                        <li class=""><a href="/licitacoes" class="link">Licitações</a></li>
                        <li class=""><a href="/noticias/noticias-e-editais-de-concursos-e-selecoes"
                                class="link">Notícias e Editais de Concursos e Seleções</a></li>
                        <li class="t"><a href="/editais-e-concursos/graduacao" class="link">Editais e
                                Concursos</a></li>
                        <li class=""><a href="/comunicacao-e-marketing/equipe-responsavel-e-contato"
                                class="link">Comunicação e Marketing</a></li>
                        <li><a class="ir-topo" href="#">Ir para o topo</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 footer-custom">
                <h2 class="oculto">
                    <a id="menu-portal">Portal</a>
                </h2>
                <div class="m-menu">
                    <ul>
                        <li class="item i343 parent"><a href="/sobre-o-sitio" class="link">Sobre o sítio</a></li>
                        <li class="item i344"><a href="/dominios-ufc-br" class="link">Dominios ufc.br</a></li>
                        <li class="item i345"><a href="/mapa-do-sitio" class="link">Mapa do sítio</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 footer-custom">

                <div class="endereco">
                    <h2 class="oculto">Endereço</h2>
                    <address><span class="postal">Av. da Universidade, 2853 - Benfica, Fortaleza - CE, CEP 60020-181 -
                            <a href="https://www.google.com.br/maps/place/Av.+da+Universidade,+2853+-+Benfica,+Fortaleza+-+CE,+60020-181/@-3.7418722,-38.5409871,17z/data=!3m1!4b1!4m5!3m4!1s0x7c7491020890039:0x2abd7761d35693b2!8m2!3d-3.7418722!4d-38.5387984"
                                class="mapa">Ver mapa</a></span> <br>
                                <span class="tel">Fone: +55 (85) 3366-7300</span> 
                    </address>
                </div>
                <!-- fim da div endereco -->

            </div>
            <!-- fim da div col-md-4 -->

            </div>

        </div>
        <!-- fim da div container -->



        <div id="creditos">
            <div class="container">
                <span class="twelve columns">© 2020 <a href="http://www.sti.ufc.br" class="sti"
                        title="Créditos">Secretaria de Tecnologia da Informação/Divisão de Portais Universitários</a>
                </span>
            </div>
        </div>
    



</footer>

<!-- FINAL DO FOOTER -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="http://barra.brasil.gov.br/barra_2.0.js" type="text/javascript"></script>

<script src="<?php echo home_url( '/' ); ?>wp-content/themes/ufc-oficial/js/acessibilidade.js"></script>
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
</body>

</html>
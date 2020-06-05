$( document ).ready(function() {
    var Contrast = {
        storage: 'contrastState',
        cssClass: 'contrast',
        currentState: null,
        check: checkContrast,
        getState: getContrastState,
        setState: setContrastState,
        toogle: toogleContrast,
        updateView: updateViewContrast
    };

    window.toggleContrast = function () { Contrast.toogle(); };

    Contrast.check();

    function checkContrast() {
        this.updateView();
    }

    function getContrastState() {
        return localStorage.getItem(this.storage) === 'true';
    }

    function setContrastState(state) {
        localStorage.setItem(this.storage, '' + state);
        this.currentState = state;
        this.updateView();
    }

    function updateViewContrast() {
        var body = document.body;

        if (this.currentState === null)
            this.currentState = this.getState();

        if (this.currentState)
            body.classList.add(this.cssClass);
        else
            body.classList.remove(this.cssClass);
    }

    function toogleContrast() {
        this.setState(!this.currentState);
    }

    /* TAMANHO DA FONTE */
    var $btnAumentar = $("#aumentar-font");
    var $btnDiminuir = $("#reduzir-font");
    var $elemento = $(".corpo-site p");
    $h5 = $(".corpo-site h5");
    $li = $(".corpo-site li");
    $navTop = $("#menu-nav-principal-2020 li");
    $artigo = $("article");
    $artigoDestaque = $("article .head");
    $span = $("span.resumo-post-destaque");


    function obterTamnhoFonte() {
    return parseFloat($elemento.css('font-size'));
    }

    $btnAumentar.on('click', function() {
    $elemento.css('font-size', obterTamnhoFonte() + 1);
    $h5.css('font-size', obterTamnhoFonte() + 1);
    $h5.css('line-height', "120%");
    $li.css('font-size', obterTamnhoFonte() + 1);
    $liTop.css('font-size', obterTamnhoFonte() + 1);
    $artigo.css('font-size', obterTamnhoFonte() + 3);
    $artigoDestaque.css('font-size', obterTamnhoFonte() + 3);
    $span.css('font-size', obterTamnhoFonte() + 1);
    $navTop.css('font-size', obterTamnhoFonte() + 1);
    });

    $btnDiminuir.on('click', function() {
    $elemento.css('font-size', obterTamnhoFonte() - 1);
    $h5.css('font-size', obterTamnhoFonte() - 1);
    $li.css('font-size', obterTamnhoFonte() - 1);
    $liTop.css('font-size', obterTamnhoFonte() - 1);
    $artigo.css('font-size', obterTamnhoFonte() - 3);
    $artigoDestaque.css('font-size', obterTamnhoFonte() - 3);
    $span.css('font-size', obterTamnhoFonte() - 1);
    $navTop.css('font-size', obterTamnhoFonte() - 1);
    });
});




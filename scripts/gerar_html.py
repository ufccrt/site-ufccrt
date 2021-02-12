import json

taes_json = json.load(open('taes.json', 'r', encoding='utf8'))
docentes_json = json.load(open('professores.json', 'r', encoding='utf8'))

#taes
taes = json.dumps(taes_json)
print(json.dumps(taes_json, indent=4))

#docentes
docentes = json.dumps(docentes_json)
print(json.dumps(docentes_json, indent=4))

docente_html = []
taes_html = []

for ijson in docentes:

    nome_professor = ijson['nome_professor']
    lattes = ijson['lattes']
    email = ijson['email']
    funcao = ijson['funcao']
    segunda_funcao = ijson['segunda_funcao']
    foto_src = ijson['foto_src']
    foto_width = ijson['foto_width']
    foto_height = ijson['foto_height']

    html_areas = []
    for area in ijson['areas']:
        item_html_area = str('<span class="atuacao">$area</span>').replace('$area', area)
        html_areas.append(item_html_area)

    modelo_html_docente = str('<div class="col-md-4 servidores">\
        <div class="avatar-serv-prof" style="background: url(\'$foto_src\'); width: $foto_width; height: $foto_height"></div>\
        <div class="dados-servidor">\
            <h2>$nome_servidor</h2>\
            <h4>Classe:$funcao</h4>\
            <h4>Email: $email</h4>\
            <h4>site: </h4>\
            <a href="$lattes" target="_blank" rel="noopener"><button class="btn btn-large btn-block btn-default" type="button">Curriculo Lattes</button></a>\
            <div class="area-prof">Área de atuação:\
                <span class="atuacao">Sistemas de Informação</span>\
                <span class="atuacao">Redes</span>\
                <span class="atuacao">Blockchain</span>\
                <span class="atuacao">Startup</span>\
                $areas\
            </div>\
        </div>\
    </div>\
    ').replace('$nome_servidor', nome_professor).replace('$funcao', funcao).replace('$email', email)\
        .replace('$lattes', lattes).replace('$foto_src', foto_src).replace('$foto_width', foto_width) \
        .replace('$foto_height', foto_height).replace('$areas', html_areas)
import json

taes_json = json.load(open('taes.json', 'r', encoding='utf8'))
docentes_json = json.load(open('professores.json', 'r', encoding='utf8'))

#taes
taes = json.dumps(taes_json)
#print(json.dumps(taes_json, indent=4))

#docentes
docentes = json.dumps(docentes_json)
#print(json.dumps(docentes_json, indent=4))

docente_html = []
taes_html = []

arquivo_html_docentes = open(str('html/docente_html_novo' + '.html'), 'w+', encoding='UTF-8')

for ijson in docentes_json:

    print(ijson)

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
        html_areas.append(str(item_html_area))
        #html_areas.join(item_html_area)

    html_areas = ''.join(html_areas)

    modelo_html_docente = str('<div class="col-md-4 servidores">\
        <div class="avatar-serv-prof" style="background: url(\'$foto_src\'); width: $foto_width; height: $foto_height"></div>\
        <div class="dados-servidor">\
            <h2>$nome_servidor</h2>\
            <h4>Classe:$funcao</h4>\
            <h4>Email: $email</h4>\
            <h4>site: </h4>\
            <a href="$lattes" target="_blank" rel="noopener"><button class="btn btn-large btn-block btn-default" type="button">Curriculo Lattes</button></a>\
            <div class="area-prof">Área de atuação:\
                $areas\
            </div>\
        </div>\
    </div>\
    ').replace('$nome_servidor', nome_professor).replace('$funcao', funcao).replace('$email', email)\
        .replace('$lattes', lattes).replace('$foto_src', foto_src).replace('$foto_width', foto_width) \
        .replace('$foto_height', foto_height).replace('$areas', str(list(html_areas)))

    docente_html.append(modelo_html_docente)

arquivo_html_docentes.writelines(docente_html)
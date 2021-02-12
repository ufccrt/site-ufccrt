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

    nome_professor = ijson['nome_professor'] if (ijson['nome_professor'] != "None" or ijson['nome_professor'] != "" or
        ijson['nome_professor'] is not None or ijson['nome_professor'] is not object) else "-"
    lattes = ijson['lattes'] if (ijson['lattes'] != "" or ijson['lattes'] is not None or ijson['lattes'] is not
        object) else "-"
    email = ijson['email'] if (ijson['email'] != "" or ijson['email'] is not None or ijson['email'] is not
        object) else "-"
    funcao = ijson['funcao'] if (ijson['funcao'] != "" or ijson['funcao'] is not None or ijson['funcao'] is not
        object) else "-"
    segunda_funcao = ijson['segunda_funcao'] if (ijson['segunda_funcao'] != "" or ijson['segunda_funcao'] is not None or
        ijson['segunda_funcao'] is not object) else "-"
    foto_src = ijson['foto_src'] if (ijson['foto_src'] != "" or ijson['foto_src'] is not None or ijson['foto_src'] is
        not object) else "-"
    foto_width = ijson['foto_width'] if (ijson['foto_width'] != "" or ijson['foto_width'] is not None or
        ijson['foto_width'] is not object) else 150
    foto_height = ijson['foto_height'] if (ijson['foto_height'] != "" or ijson['foto_height'] is not None or
        ijson['foto_height'] is not object) else 150

    html_areas = str("")
    for area in ijson['areas']:
        item_html_area = str('<span class="atuacao">$area</span>').replace('$area', area)

        html_areas = html_areas.join(str(item_html_area))

    modelo_html_docente = str('<div class="col-md-4 servidores">\n\
        <div class="avatar-serv-prof" style="background: url(\'$foto_src\'); width: $foto_widthpx; height: $foto_heightpx"></div>\n\
        <div class="dados-servidor">\n\
            <h2>$nome_servidor</h2>\n\
            <h4>Classe:$funcao</h4>\n\
            <h4>Email: $email</h4>\n\
            <h4>site: </h4>\n\
            <a href="$lattes" target="_blank" rel="noopener"><button class="btn btn-large btn-block btn-default" type="button">Curriculo Lattes</button></a>\n\
            <div class="area-prof">Área de atuação:\n\
                $areas\
            </div>\n\
        </div>\n\
    </div>\n\
    ').replace('$nome_servidor', nome_professor).replace('$funcao', funcao).replace('$email', email)\
        .replace('$lattes', lattes).replace('$foto_src', foto_src).replace('$foto_width', foto_width) \
        .replace('$foto_height', foto_height)

    #.replace('$areas', html_areas)

    docente_html.append(modelo_html_docente)


arquivo_html_docentes.writelines(docente_html)
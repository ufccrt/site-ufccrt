import json

docentes_json = json.load(open('professores.json', 'r', encoding='utf8'))

#docentes
docentes = json.dumps(docentes_json)

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

    html_areas = []
    for area in ijson['areas']:
        item_html_area = str('<span class="atuacao">' + area + '</span>')

        html_areas.append(str(item_html_area))

    modelo_html_docente = str('<div class="col-md-4 servidores">\n\
        <div class="avatar-serv-prof" style="background: url(\'' + str(foto_src) + '\'); width: ' + str(foto_width) + 'px; height: ' + str(foto_height) + 'px"></div>\n\
        <div class="dados-servidor">\n\
            <h2>' + str(nome_professor) + '</h2>\n\
            <h4>Classe: ' + str(funcao) + '</h4>\n\
            <h4>Email: ' + str(email) + '</h4>\n\
            <h4>site: </h4>\n\
            <a href="' + str(lattes) + '" target="_blank" rel="noopener"><button class="btn btn-large btn-block btn-default" type="button">Curriculo Lattes</button></a>\n\
            <div class="area-prof">Área de atuação:\n\
                ' + str([iarea for iarea in html_areas])
                              .replace('[', '').replace(']', '').replace('\'', '').replace(',', '') + "\
            </div>\n\
        </div>\n\
    </div>\n\
    ")

    docente_html.append(modelo_html_docente)

arquivo_html_docentes.writelines(docente_html)
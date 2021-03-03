import json

taes_json = json.load(open('taes.json', 'r', encoding='utf8'))

#taes
taes = json.dumps(taes_json)

taes_html = []

arquivo_html_taes = open(str('html/taes_html_novo' + '.html'), 'w+', encoding='UTF-8')

for ijson in taes_json:

    print(ijson)

    nome_tae = ijson['tae'] if (ijson['tae'] != "None" or ijson['tae'] != "" or
        ijson['tae'] is not None or ijson['tae'] is not object) else "-"
    email = ijson['email'] if (ijson['email'] != "" or ijson['email'] is not None or ijson['email'] is not
        object) else "-"
    funcao = ijson['cargo'] if (ijson['cargo'] != "" or ijson['cargo'] is not None or ijson['cargo'] is not
        object) else "-"
    foto_src = ijson['foto_src'] if (ijson['foto_src'] != "" or ijson['foto_src'] is not None or ijson['foto_src'] is
        not object) else "-"
    foto_width = ijson['foto_width'] if (ijson['foto_width'] != "" or ijson['foto_width'] is not None or
        ijson['foto_width'] is not object) else 150
    foto_height = ijson['foto_height'] if (ijson['foto_height'] != "" or ijson['foto_height'] is not None or
        ijson['foto_height'] is not object) else 150


    modelo_html_tae = str('<div class="col-md-4 servidores">\n\
        <div class="avatar-serv-prof" style="background: url(\'' + str(foto_src) + '\'); width: ' + str(foto_width) + 'px; height: ' + str(foto_height) + 'px"></div>\n\
        <div class="dados-servidor">\n\
            <h2>' + str(nome_tae) + '</h2>\n\
            <h4>Cargo: ' + str(funcao) + '</h4>\n\
            <h4>Email: ' + str(email) + '</h4>\n\
        </div>\n\
    </div>\n')


    taes_html.append(modelo_html_tae)

arquivo_html_taes.writelines(taes_html)
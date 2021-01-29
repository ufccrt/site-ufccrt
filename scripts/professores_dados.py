from bs4 import BeautifulSoup
import requests
import re

headers = requests.utils.default_headers()
headers.update({
    'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0'
})

site = 'http://crateus.ufc.br/professores/'

data = requests.get(site, headers=headers)

resultados = []

lista_arquivo = []

arquivo = open(str('professores' + '.txt'), 'w+', encoding='UTF-8')

if data.status_code == requests.codes.ok:
    info = BeautifulSoup(data.text, 'html.parser')

    blocos = ((info.find('div', {'class': 'col-md-9'})).findAll('div', {'class': 'cartaoServidorConteiner'}))

    for b in blocos:
        # impacto = str((b.find('td', {'class': 'sentiment'})).get('data-img_key')).replace('bull', '')
        # horario = str(b.get('data-event-datetime')).replace('/', '-')
        # par = (b.find('td', {'class': 'left flagCur noWrap'})).text.strip()

        #url_foto = str((b.find('div', {'class': 'cartaoServidorFoto'}).find('img')).get('src'))
        ###url_foto = str((b.find('div', {'class': 'cartaoServidorFoto'})).find('img')).removesuffix(' title="Foto do Servidor" width="150"/>').removeprefix('<img class="cartaoServidorFotoCantosArredondados" height="150" src=')
        imagem_attr = str((b.find('div', {'class': 'cartaoServidorFoto'})).find('img')).removeprefix("None")
        parts = re.findall("(http://.*g)|(http://.*G)", imagem_attr)

        #url_foto = str((b.find('div', {'class': 'cartaoServidorFoto'})).find('img')).replace()
        if parts != "" or len(parts) > 0:
            print(parts[0][0])



        #print(imagem_attr)
        width_foto = ""
        height_foto = ""

        nome_servidor = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('h4').text.strip()


        ###resultados.append({'par': par, 'horario': horario, 'impacto': impacto})

        #resultados.append(nome_servidor + "\t" + parts[3])

        ###lista_arquivo.append(str(par + ',' + horario + ',' + impacto + '\n'))
        #lista_arquivo.append(nome_servidor + "\t" + parts[3] + "\n")
        lista_arquivo.append(imagem_attr + "\n")

#print("===> " + resultados)

arquivo.writelines(lista_arquivo)
arquivo.close()
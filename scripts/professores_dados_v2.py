from bs4 import BeautifulSoup
import requests
import re
import json

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
        nome_servidor = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('h4').text.strip()


        ###resultados.append({'par': par, 'horario': horario, 'impacto': impacto})

        #resultados.append(nome_servidor + "\t" + parts[3])

        registro = {'nome_professor': nome_servidor}
        resultados.append(registro)

        ###lista_arquivo.append(str(par + ',' + horario + ',' + impacto + '\n'))
        #lista_arquivo.append(nome_servidor + "\t" + parts[3] + "\n")
        #lista_arquivo.append(json.dumps(b) + "\n")



        # nome professor
        #lista_arquivo.append(nome_servidor + "\t" + "\n")
        #print(nome_servidor)


        # mais dados
        mais_dados = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('p', {'class': 'cartaoServidorParagrafo'}).text.strip()

        campos_e_dados = str(mais_dados).split(':')
        print(json.dumps(campos_e_dados))

        print(json.dumps(mais_dados))


#print("===> " + resultados)

arquivo.writelines(lista_arquivo)
arquivo.close()
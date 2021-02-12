from bs4 import BeautifulSoup
import requests
import json

headers = requests.utils.default_headers()
headers.update({
    'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0'
})

site = 'http://crateus.ufc.br/tecnico-administrativo-2/'
data = requests.get(site, headers=headers)
resultados = []
lista_arquivo = []

arquivo = open(str('taes' + '.json'), 'w+', encoding='UTF-8')

if data.status_code == requests.codes.ok:
    info = BeautifulSoup(data.text, 'html.parser')

    blocos = ((info.find('div', {'class': 'col-md-9'})).findAll('div', {'class': 'cartaoServidorConteiner'}))

    i = 1
    for b in blocos:
        nome_servidor = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('h4').text.strip()

        # mais dados
        mais_dados = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('p', {'class': 'cartaoServidorParagrafo'}).text.strip()

        campos_e_dados = str(mais_dados).split(':')
        #print(json.dumps(campos_e_dados))

        # função
        funcao = str(campos_e_dados[1]).strip().replace('\n', '').replace('E-mail', '').replace('Função', '').replace('E-Mail', '')

        # email e segundafuncao
        email = ""
        segunda_funcao = ""
        if len(campos_e_dados) > 2:
            chk_email = campos_e_dados[2].find('@')
            if chk_email > 0:
                email = str(campos_e_dados[2]).strip()\
                    .replace('Site', '')\
                    .replace('\n', '')\
                    .replace('\n\n\n\u00c1rea de atua\u00e7\u00e3o', '')\
                    .replace('\n', '')\
                    .replace('\u00c1rea de atua\u00e7\u00e3o', '')\
                    .replace('\n\n\u00c1rea de atua\u00e7\u00e3o', '')

            else:
                email = campos_e_dados[3]

        else:
            email = "None"

        registro = {'tae': nome_servidor, 'email': email, 'cargo': funcao}
        resultados.append(registro)

        if i == 1:
            lista_arquivo.append("[")
        lista_arquivo.append(json.dumps(registro)+",\n")

        print(registro)
        #print(campos_e_dados)

        i += 1

lista_arquivo.append("]")

arquivo.writelines(lista_arquivo)
arquivo.close()
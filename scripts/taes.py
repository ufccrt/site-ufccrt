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

        # função
        funcao = str(campos_e_dados[1]).strip().replace('\n', '').replace('E-mail', '').replace('Função', '').replace('E-Mail', '')

        # email e segundafuncao
        email = ""
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

        # info da foto
        card_foto = (b.find('div', {'class': 'cartaoServidorFoto'}))\
            .findAll('img', {'class': 'cartaoServidorFotoCantosArredondados'})

        foto_src = ""
        foto_width = 0
        foto_height = 0

        for cf in card_foto:
            foto_src = cf.get('src')
            foto_width = cf.get('width')
            foto_height = cf.get('height')

        registro = {'tae': nome_servidor, 'email': email, 'cargo': funcao, 'foto_src': foto_src,
                    'foto_width': foto_width, 'foto_height': foto_height}
        resultados.append(registro)

        if i == 1:
            lista_arquivo.append("[")
        lista_arquivo.append(json.dumps(registro)+",\n")

        i += 1

lista_arquivo.append("]")

arquivo.writelines(lista_arquivo)
arquivo.close()
from bs4 import BeautifulSoup
import requests
import json

headers = requests.utils.default_headers()
headers.update({
    'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0'
})

site = 'http://crateus.ufc.br/professores/'
data = requests.get(site, headers=headers)
resultados = []
lista_arquivo = []

arquivo = open(str('professores' + '.json'), 'w+', encoding='UTF-8')

if data.status_code == requests.codes.ok:
    info = BeautifulSoup(data.text, 'html.parser')

    blocos = ((info.find('div', {'class': 'col-md-9'})).findAll('div', {'class': 'cartaoServidorConteiner'}))

    i = 1
    for b in blocos:
        nome_servidor = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('h4').text.strip()

        # mais dados
        mais_dados = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('p', {'class': 'cartaoServidorParagrafo'}).text.strip()
        lattes_link = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('p', {'class': 'cartaoServidorParagrafo'}).find_all('a')
        areas_atuacao = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('div', {'class': 'AreasAtuacaoProfessor'}).findAll('div', {'tagAreaAtuacao'})

        campos_e_dados = str(mais_dados).split(':')
        #print(json.dumps(campos_e_dados))

        # função
        funcao = str(campos_e_dados[1]).strip().replace('\n', '').replace('E-mail', '').replace('Função', '')

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
                segunda_funcao = str(campos_e_dados[2]).replace('\nE-mail', '')
        else:
            email = "None"

        #Áreas de atuação
        areas_atuacao_professor = []
        for at in areas_atuacao:
            areas_atuacao_professor.append(at.text)

        lattes = ""
        for la in lattes_link:
            lattes = la.get('href')

        registro = {'nome_professor': nome_servidor, 'lattes': lattes, 'email': email, 'funcao': funcao, 'segunda_funcao': segunda_funcao, 'areas': areas_atuacao_professor}
        resultados.append(registro)

        if i == 1:
            lista_arquivo.append("[")
        lista_arquivo.append(json.dumps(registro)+",\n")

        i += 1

lista_arquivo.append("]")

arquivo.writelines(lista_arquivo)
arquivo.close()
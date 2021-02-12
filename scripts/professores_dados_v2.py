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

arquivo = open(str('professores' + '.json'), 'w+', encoding='UTF-8')

if data.status_code == requests.codes.ok:
    info = BeautifulSoup(data.text, 'html.parser')

    blocos = ((info.find('div', {'class': 'col-md-9'})).findAll('div', {'class': 'cartaoServidorConteiner'}))

    i = 1
    for b in blocos:
        nome_servidor = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('h4').text.strip()


        ###resultados.append({'par': par, 'horario': horario, 'impacto': impacto})

        #resultados.append(nome_servidor + "\t" + parts[3])

        ###lista_arquivo.append(str(par + ',' + horario + ',' + impacto + '\n'))
        #lista_arquivo.append(nome_servidor + "\t" + parts[3] + "\n")
        #lista_arquivo.append(json.dumps(b) + "\n")



        # nome professor
        #lista_arquivo.append(nome_servidor + "\t" + "\n")
        #print(nome_servidor)


        # mais dados
        mais_dados = (b.find('div', {'class': 'cartaoServidorInformacoes'})).find('p', {'class': 'cartaoServidorParagrafo'}).text.strip()
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
            #print("===> " + str(chk_email))
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
            #email = campos_e_dados[2]

        #print(str(i) + " => " + " | " + nome_servidor + " / " + funcao + " / " + email)

        # captando areas de atuacao
        areas_atuacao_professor = []
        for at in areas_atuacao:
            areas_atuacao_professor.append(at.text)

        registro = {'nome_professor': nome_servidor, 'email': email, 'funcao': funcao, 'segunda_funcao': segunda_funcao, 'areas': areas_atuacao_professor}
        resultados.append(registro)

        print("\n")
        if i == 1:
            lista_arquivo.append("[")
        lista_arquivo.append(json.dumps(registro)+",\n")

        #print(json.dumps(mais_dados))

        i += 1

lista_arquivo.append("]")

#print("===> " + resultados)

arquivo.writelines(lista_arquivo)
arquivo.close()
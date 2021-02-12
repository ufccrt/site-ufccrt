import json

taes_json = json.load(open('taes.json', 'r', encoding='utf8'))
docentes_json = json.load(open('professores.json', 'r', encoding='utf8'))

#taes
print(json.dumps(taes_json, indent=4))

#docentes
print(json.dumps(docentes_json, indent=4))

docente_html = []
taes_html = []


from random import randint

def nombre_coups():
    '''Simule un jeu de plateau avec 12 cases et renvoie le nombre
    nécessaire de coups pour visiter toutes les cases.'''
    nombre_cases = 12
    # indique si une case a été vue
    cases_vues = [ False ] * nombre_cases
    nombre_cases_vues = 1
    cases_vues[0] = True
    case_en_cours = 0
    n = 0
    while nombre_cases_vues < nombre_cases:
        x = randint(1, 6)
        case_en_cours = (case_en_cours + x) % nombre_cases
        if x:
            cases_vues[case_en_cours] = True
            nombre_cases_vues = nombre_cases_vues + 1
        n = n + 1
    return n

print(nombre_coups())

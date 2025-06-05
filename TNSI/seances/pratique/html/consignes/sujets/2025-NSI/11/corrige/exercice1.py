from collections import deque

def parcours_largeur(arbre):
    if arbre is None:
        return []

    file = deque([arbre])
    result = []

    while file:
        noeud = file.popleft()
        gauche, etiquette, droite = noeud
        result.append(etiquette)
        if gauche is not None:
            file.append(gauche)
        if droite is not None:
            file.append(droite)

    return result

arbre = ( ( (None, 1, None), 2, (None, 3, None) ),
4,
( (None, 5, None), 6, (None, 7, None) ) )
print(parcours_largeur(arbre))

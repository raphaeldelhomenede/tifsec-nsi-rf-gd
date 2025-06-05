def renverse(pile):
    '''renvoie une pile contenant les mêmes éléments que pile,
    mais dans l'ordre inverse.
    Cette fonction détruit pile.'''
    copie = pile.copy()
    pile_inverse = []
    while copie:
        pile_inverse.append(copie.pop())
    return pile_inverse


def positifs(pile):
    '''Renvoie une pile contenant les éléments positifs de pile, dans le même ordre.
    Ne modifie pas la pile d'origine.'''
    copie = pile.copy()
    pile_positifs = []
    temp = []

    while copie:
        valeur = copie.pop()
        if valeur >= 0:
            temp.append(valeur)

    # remettre dans l'ordre original
    while temp:
        pile_positifs.append(temp.pop())

    return pile_positifs

print(renverse([1, 2, 3, 4, 5]))
print(positifs([-1, 0, 5, -3, 4, -6, 10, 9, -8]))
print(positifs([-2]))

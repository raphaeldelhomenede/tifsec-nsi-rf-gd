def recherche(elt, tab):
    indice = None
    for i in range(len(tab)):
        if tab[i] == elt:
            indice = i
    return indice

print(recherche(1, [2, 3, 4]))
print(recherche(1, [10, 12, 1, 56]))
print(recherche(1, [1, 0, 42, 7]))
print(recherche(1, [1, 50, 1]))
print(recherche(1, [8, 1, 10, 1, 7, 1, 8]))

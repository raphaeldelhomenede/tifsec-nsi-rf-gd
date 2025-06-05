def recherche(elt, tab):
    indice = 0
    for i in tab:
        if i == elt:
            return indice
        indice += 1

print(recherche(1, [2, 3, 4]))
print(recherche(1, [10, 12, 1, 56]))
print(recherche(50, [1, 50, 1]))
print(recherche(15, [8, 9, 10, 15]))

def recherche_min(tab):
    indice_min = 0
    for i in range(len(tab)):
        if tab[i] < tab[indice_min]:
            indice_min = i
    return indice_min

print(recherche_min([5]))
print(recherche_min([2, 4, 1]))
print(recherche_min([5, 3, 2, 2, 4]))
print(recherche_min([-1, -2, -3, -3]))

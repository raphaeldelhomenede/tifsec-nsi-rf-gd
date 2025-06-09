def recherche_indices_classement(elt, tab):
    indice = 0
    tab1 = []
    tab2 = []
    tab3 = []
    for i in tab:
        if i < elt:
            tab1.append(indice)
        elif i == elt:
            tab2.append(indice)
        elif i > elt:
            tab3.append(indice)
        indice += 1
    return tab1, tab2, tab3

print(recherche_indices_classement(3, [1, 3, 4, 2, 4, 6, 3, 0]))
print(recherche_indices_classement(3, [1, 4, 2, 4, 6, 0]))
print(recherche_indices_classement(3, [1, 1, 1, 1]))
print(recherche_indices_classement(3, []))

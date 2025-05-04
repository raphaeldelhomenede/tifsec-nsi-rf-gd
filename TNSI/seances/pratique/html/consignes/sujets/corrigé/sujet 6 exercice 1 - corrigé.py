def  maximum_tableau(tab=None):
    if type(tab) != list:
        return "Erreur : l'entrée doit être une liste."
    elif not tab:
        return "Erreur : la liste est vide."
    else:
        return max(tab)

print(maximum_tableau([98, 12, 104, 23, 131, 9]))
print(maximum_tableau([-27, 24, -3, 15]))
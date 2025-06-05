def maximum_tableau(tab):
    if len(tab) == 0:
        return False

    if not all(isinstance(i, int) for i in tab):
        return False

    valeur_max = tab[0]
    for i in tab:
        if i > valeur_max:
            valeur_max = i
    return valeur_max

print(maximum_tableau([98, 12, 104, 23, 131, 9]))
print(maximum_tableau([-27, 24, -3, 15]))

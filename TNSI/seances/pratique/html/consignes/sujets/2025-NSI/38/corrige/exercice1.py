def moyenne(tab):
    total = 0
    nb_de_nb = 0
    for i in range(len(tab)):
        total += tab[i]
        nb_de_nb += 1
    return total / nb_de_nb

print(moyenne([1.0]))
print(moyenne([1.0, 2.0, 4.0]))

def moyenne(tab):
    total = 0
    nb_de_chiffres = 0
    for i in tab:
        total += i
        nb_de_chiffres += 1
    return total / nb_de_chiffres

print(moyenne([1]))
print(moyenne([1, 2, 3, 4, 5, 6, 7]))
print(moyenne([1, 2]))
